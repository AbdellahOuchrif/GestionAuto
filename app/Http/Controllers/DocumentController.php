<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view("Document.index", [
            "documents" => $documents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        Document::create([
            "type" => $request->type_document
        ]);
        return redirect(route("Document.index"))->with('success', 'Le type de document '. $request->type_document .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, string $id)
    {
        Document::where('id', $id)->update([
            "type" => $request->type_document
        ]);
        return redirect(route("Document.index"))->with('success', 'Le type de document '. $request->type_document .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Document::destroy($id);
        return redirect(route("Document.index"))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
