<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('is_admin');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('is_admin');
        if($request->has('search')) {
            $users = User::where('name', 'LIKE', '%' .$request->search. '%')
            ->orWhere('email', 'like', '%' .$request->search. '%')
            ->paginate(10);
         }else {
            $users = DB::table('users')
            ->latest('id')->paginate(10);
        }
       
        return view('home.data-pegawai', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); // Menghash password sebelum disimpan

        DB::table('users')->insert($data);

        return redirect()->route('users.index')->with('success', 'Berhasil menambah data pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Tidak dapat edit user yang sedang login.');
        }

            // Check if the new phone number already exists for another user
        $existingUser = User::where('notelp', $request->input('notelp'))
        ->where('id', '<>', $user->id) // Exclude the current user
        ->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Nomor telepon sudah digunakan oleh pengguna lain.');
        }

        $user->update($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         // Cek apakah ada relasi dengan tabel repairs
        if (Repair::where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus data pegawai karena sedang melakukan perbaikan servis.');
        }
        
        if ($user->id === auth()->user()->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus user yang sedang login.');
        }
        
        $user->delete();

        return redirect()->route('users.index')
        ->with('success', 'berhasil menghapus data!');
    }
}
