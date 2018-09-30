<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DB::table('documents')->select(DB::raw('area'))
                     ->groupBy('area')
                     ->get();
        //$reports = Document::all();
        return view('Documentos.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $file = $request->file('archivo'); 
        $nombre = $file->getClientOriginalName();
        
        $pe=DB::table('documents')->where('archivo', $nombre)->get();
        if(count($pe)>0){
            $notificacion = array(
                'message' => 'No se puede guardar el archivo, el documento ya existe.', 
                'alert-type' => 'error'
            );
            return back()->with($notificacion);

        }
        $path = $request->file('archivo')->store('Forma_Documents');
        $ext=(explode(".",$path));


        $document = new Document;
        $document->ruta = $path;
        $document->archivo = $nombre;
        $document->nombre = Auth()->user()->name;
        $document->descripcion = $request->input('descripcion');
        $document->tipo = $request->input('tipo');
        $document->area = $request->input('area');
        $document->ext = $ext[1];
        //dd($path);
        $document->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function descargar($id)
    {
        $report = Document::find($id);

        return storage::download($report->ruta, $report->archivo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function principal()
    {
        $reports = DB::table('documents')->select(DB::raw('area'))
                     ->groupBy('area')
                     ->get();
        //dd($reports);
        return view('Documentos.home', compact('reports'));
    }

    public function sub($area)
    {
        $reports = DB::table('documents')->select(DB::raw('tipo'))
                     ->where('area', $area)
                     ->groupBy('tipo')
                     ->get();
        //$area=$_GET['area'];    
        //dd($reports);
        return view('Documentos.sub', compact('reports', 'area'));
    }

    public function reporte($area, $tipo)
    {
        $reports = DB::table('documents')
            ->where([['area', $area], ['tipo', $tipo]])
            ->get();

        $prueba = ($reports[0]->ruta);
        $ext=(explode(".",$prueba));
        //dd($ext[1]);
        return view('Documentos.reporte', compact('reports'));
    }
    
}
