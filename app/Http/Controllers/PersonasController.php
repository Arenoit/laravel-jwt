<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;


class PersonasController extends Controller
{
    protected $validateMessages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.unique' => 'El nombre ya está registrado.',
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'Debe ser un email válido.',
        'email.unique' => 'El email ya está registrado.',
        'fecha_n.required' => 'La fecha de nacimiento es obligatoria.',
        'fecha_n.date' => 'Debe ser una fecha válida.',
    ];

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'email' => 'required|email|unique:personas,email',
            'fecha_n' => 'required|date',
        ], $this->validateMessages);

        if ($validator->fails()) {
            Toastr::error('Hay errores en el formulario.');
            return back()->withErrors($validator)->withInput();
        }

        Personas::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_de_nacimiento' => $request->input('fecha_n'),
        ]);

        Toastr::success('Persona guardada correctamente.');
        return back();
    }
    public function edit(Request $request)
    {
        $id = $request->id;

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                Rule::unique('personas', 'nombre')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('personas', 'email')->ignore($id),
            ],
            'fecha_n' => 'required|date',
        ], $this->validateMessages);

        if ($validator->fails()) {
            Toastr::error('Hay errores en el formulario.');
            return back()->withErrors($validator)->withInput();
        }

        $persona = Personas::findOrFail($id);
        $persona->update([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'fecha_de_nacimiento' => $request->input('fecha_n'),
        ]);

        Toastr::success('Persona actualizada correctamente.');
        return back();
    }
    public function delete($id){
        $formProvince = Personas::findOrFail($id);
        $formProvince->delete();
        Toastr::success('Persona eliminada.');
        return back();
    }
}
