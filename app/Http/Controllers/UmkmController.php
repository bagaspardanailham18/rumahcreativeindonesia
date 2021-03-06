<?php

namespace App\Http\Controllers;

use App\Umkm;
use App\KategoriUmkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'Data UMKM';
        $data['umkms'] = Umkm::all();

        return view('umkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Data UMKM';
        $data['actionUrl']  = route('umkm.store');
        $data['kategori_umkms']     = KategoriUmkm::all();

        return view('umkm.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_umkm' => "required",
            'nama'             => "required",
            'alamat'           => "required",
            'telepon'          => "required",
            'instagram'        => "required",
            'pemilik'          => "required",
            'shopee'           => "required",
            'tokopedia'        => "required",
            'bukalapak'        => "required"
        ]);
            
        $umkmData['id_kategori_umkm'] = $request->id_kategori_umkm;
        $umkmData['nama']             = $request->nama;
        $umkmData['alamat']           = $request->alamat;
        $umkmData['telepon']          = $request->telepon;
        $umkmData['instagram']        = $request->instagram;
        $umkmData['pemilik']          = $request->pemilik;
        $umkmData['shopee']           = $request->shopee;
        $umkmData['tokopedia']        = $request->tokopedia;
        $umkmData['bukalapak']        = $request->bukalapak;

        if (Umkm::create($umkmData)) {
            return redirect('umkm')->with('success', 'Data UMKM berhasil ditambahkan!');
        } else {
            return redirect('umkm/create')->with('error', 'Data UMKM gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Umkm $umkm)
    {
        $data['title']              = 'Edit UMKM';
        $data['actionUrl']          = route('umkm.update', $umkm);
        $data['kategori_umkms']     = KategoriUmkm::all();
        $data['umkm']               = $umkm;

        return view('umkm.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori_umkm' => "required",
            'nama'             => "required",
            'alamat'           => "required",
            'telepon'          => "required",
            'instagram'        => "required",
            'pemilik'          => "required",
            'shopee'           => "required",
            'tokopedia'        => "required",
            'bukalapak'        => "required"
        ]);

        $umkm = Umkm::findOrFail($id);
        

        $umkmData['id_kategori_umkm'] = $request->id_kategori_umkm;
        $umkmData['nama']             = $request->nama;
        $umkmData['alamat']           = $request->alamat;
        $umkmData['telepon']          = $request->telepon;
        $umkmData['instagram']        = $request->instagram;
        $umkmData['pemilik']          = $request->pemilik;
        $umkmData['shopee']           = $request->shopee;
        $umkmData['tokopedia']        = $request->tokopedia;
        $umkmData['bukalapak']        = $request->bukalapak;


        if ($umkm->update($umkmData)) {
            return redirect('umkm')->with('success', 'Data UMKM berhasil diubah!');
        } else {
            return redirect('umkm/create')->with('error', 'Data UMKM gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {
        if ($umkm->delete()) {
            return redirect('umkm')->with('success', 'Data Mitra berhasil dihapus!');
        } else {
            return redirect('umkm/create')->with('error', 'Data Mitra gagal dihapus!');
        }
    }
}
