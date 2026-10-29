<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empresa;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all(['id_empresa', 'nombre']);
        return view('usuarios.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:100',
            'password' => 'required',
            'rol' => 'required',
            'activo' => 'required',
            'id_empresa' => 'required|exists:empresa,id_empresa',
        ]);

        Usuario::create([
            'username' => $request->username,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'rol' => $request->rol,
            'activo' => $request->activo,
            'fecha_creacion' => now(),
            'id_empresa' => $request->id_empresa,
        ]);

        return redirect()->route('usuarios.index')
                        ->with('success', 'Usuario creado exitosamente.');
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
    public function edit(Usuario $usuario)
    {
        $empresas = Empresa::all(['id_empresa', 'nombre']);
        return view('usuarios.edit', compact('usuario', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'username' => 'required|max:100',
            'rol' => 'required',
            'activo' => 'required',
            'id_empresa' => 'required|exists:empresa,id_empresa',
        ]);

        $datos = [
            'username' => $request->username,
            'rol' => $request->rol,
            'activo' => $request->activo,
            'id_empresa' => $request->id_empresa,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8',
            ]);

            $datos['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $usuario->update($datos);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }

}
