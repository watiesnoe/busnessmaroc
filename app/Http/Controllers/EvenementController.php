<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $evenements = Evenement::withCount(['tickets as total_tickets' => function($query) {
                $query->select(DB::raw("COALESCE(SUM(quantite),0)"));
            }])
                ->orderBy('date_debut', 'desc');

            return DataTables::of($evenements)
                ->addIndexColumn()
                ->addColumn('actions', function ($event) {
                    $editUrl = route('evenements.edit', $event->id);
                    $deleteUrl = route('evenements.destroy', $event->id);
                    $clientsUrl = route('evenements.clients', $event->id);

                    return '
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="'.$editUrl.'"><i class="fa fa-edit me-2"></i>Éditer</a></li>
                            <li><a class="dropdown-item" href="'.$clientsUrl.'"><i class="fa fa-users me-2"></i>Clients</a></li>
                            <li><button class="dropdown-item delete-btn" data-url="'.$deleteUrl.'"><i class="fa fa-trash me-2"></i>Supprimer</button></li>
                        </ul>
                    </div>';
                })
                ->editColumn('prix_ticket', function($event) {
                    return number_format($event->prix_ticket, 0, ',', ' ') . ' FCFA';
                })
                ->editColumn('date_debut', function($event){
                    return Carbon::parse($event->date_debut)->format('d M Y H:i');
                })
                ->editColumn('date_fin', function($event){
                    return Carbon::parse($event->date_fin)->format('d M Y H:i');
                })
                ->addColumn('tickets', function($event) {
                    return $event->total_tickets; // nombre total de tickets pris
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.evenements.index'); // ta vue avec DataTable
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.evenements.creation'); // ta vue pour créer un événement
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'titre'        => 'required|string|max:255',
            'lieu'         => 'required|string|max:255',
            'description'  => 'required|string',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'prix_ticket'  => 'required|numeric|min:0',
            'statut'       => 'required|in:à venir,terminé,annulé',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
            'nombre_limite_places' => 'required|integer|min:1',

        ]);

        // ✅ Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evenements', 'public');
        }

        // ✅ Création de l’événement
        $evenement = Evenement::create([
            'titre'       => $validated['titre'],
            'lieu'        => $validated['lieu'],
            'description' => $validated['description'],
            'date_debut'  => $validated['date_debut'],
            'date_fin'    => $validated['date_fin'],
            'prix_ticket' => $validated['prix_ticket'],
            'statut'      => $validated['statut'],
            'image'       => $imagePath,
            'nombre_limite_places'       => $validated['nombre_limite_places'],
        ]);

        // ✅ Si AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Événement enregistré avec succès',
                'data'    => $evenement
            ]);
        }

        // ✅ Si formulaire classique
        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès !');
    }
    /**
     * Display the specified resource.
     */



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('admin.evenements.creation',compact('evenement'));
    }
    public function update(Request $request, $id)
    {
        // ✅ Récupération de l'événement
        $evenement = Evenement::findOrFail($id);

        // ✅ Validation
        $validated = $request->validate([
            'titre'        => 'required|string|max:255',
            'lieu'         => 'required|string|max:255',
            'description'  => 'required|string',
            'date_debut'   => 'required|date',
            'date_fin'     => 'required|date|after_or_equal:date_debut',
            'prix_ticket'  => 'required|numeric|min:0',
            'statut'       => 'required|in:à venir,terminé,annulé',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
            'nombre_limite_places' => 'required|integer|min:1',
        ]);

        // ✅ Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l’ancienne image si elle existe
            if ($evenement->image && Storage::disk('public')->exists($evenement->image)) {
                Storage::disk('public')->delete($evenement->image);
            }

            // Sauvegarder la nouvelle image
            $validated['image'] = $request->file('image')->store('evenements', 'public');
        }

        // ✅ Mise à jour
        $evenement->update($validated);

        // ✅ Si AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Événement mis à jour avec succès',
                'data'    => $evenement
            ]);
        }

        // ✅ Si classique
        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès !');
    }
    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function parEvenement($id, Request $request)
    {
        $evenement = Evenement::findOrFail($id);

        if ($request->ajax()) {
            $tickets = $evenement->tickets()->with('user')->select('tickets.*');

            return DataTables::of($tickets)
                ->addColumn('nom', fn($ticket) => $ticket->user->name ?? 'Utilisateur supprimé')
                ->addColumn('email', fn($ticket) => $ticket->user->email ?? '-')
                ->editColumn('quantite', fn($ticket) => $ticket->quantite)
                ->editColumn('montant_total', fn($ticket) => number_format($ticket->montant_total, 0, ',', ' ') . ' FCFA')
                ->editColumn('statut', function ($ticket) {
                    $badgeClass = $ticket->statut === 'paye' ? 'success' : 'warning';
                    $icon = $ticket->statut === 'paye' ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-hourglass-half"></i>';
                    return '<span class="badge bg-' . $badgeClass . '">' . $icon . ' ' . ucfirst($ticket->statut) . '</span>';
                })
                ->editColumn('created_at', fn($ticket) => $ticket->created_at->format('d/m/Y H:i'))
                ->addColumn('actions', function ($ticket) {
                    $dropdown = '<div class="dropdown">';
                    $dropdown .= '<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">';
                    $dropdown .= '<i class="fa fa-ellipsis-h"></i>';
                    $dropdown .= '</button>';
                    $dropdown .= '<ul class="dropdown-menu">';

                    // Confirmer si non payé
                    if ($ticket->statut !== 'paye') {
                        $dropdown .= '<li>
                                    <button class="dropdown-item confirmer-btn" data-id="' . $ticket->id . '">
                                        <i class="fa fa-check me-1"></i> Confirmer
                                    </button>
                                  </li>';
                    }

                    // Imprimer toujours disponible
                    $printUrl = route('tickets.print', $ticket->id);
                    $dropdown .= '<li>
                                <a href="' . $printUrl . '" target="_blank" class="dropdown-item">
                                    <i class="fa fa-print me-1"></i> Imprimer
                                </a>
                              </li>';

                    $dropdown .= '</ul></div>';

                    return $dropdown;
                })
                ->rawColumns(['statut', 'actions'])
                ->make(true);
        }

        return view('admin.evenements.reservations', compact('evenement'));
    }





//    public function confirmerTicket($id)
//    {
//        $ticket = Ticket::findOrFail($id);
//        $ticket->statut = 'paye'; // ou 'confirmé' selon ton choix
//        $ticket->save();
//
//        return response()->json([
//            'success' => true,
//            'message' => 'Réservation confirmée avec succès'
//        ]);
//    }

}
