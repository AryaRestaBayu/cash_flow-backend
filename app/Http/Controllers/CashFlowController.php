<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    public function index()
    {
        $cashFlows = CashFlow::where('user_id', auth()->user()->id)
        ->orderBy('tanggal', 'desc')
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($cashFlows);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'alasan' => 'required',
        ]);

        $cashFlow = CashFlow::create([
            'user_id' => auth()->user()->id,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan,
        ]);

        return response()->json(['message' => 'Cash flow created', 'data' => $cashFlow]);
    }

    public function show($id)
    {
        $cashFlow = CashFlow::findOrFail($id);
        return response()->json($cashFlow);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'alasan' => 'required',
        ]);

        $cashFlow = CashFlow::findOrFail($id);
        $cashFlow->update([
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan,
        ]);

        return response()->json(['message' => 'Cash flow updated', 'data' => $cashFlow]);
    }

    public function destroy($id)
    {
        $cashFlow = CashFlow::findOrFail($id);
        $cashFlow->delete();

        return response()->json(['message' => 'Cash flow deleted']);
    }
}
