@extends('layouts.main')
@section('content')
    <h1 class="font-bold text-2xl mb-6">List Transaksi</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dibuat oleh
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $transaction)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $transaction->item->item_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaction->item->item_description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->item->item_price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->user->name }}
                        </td>
                        <td class="px-6 py-4 flex gap-2 items-center">
                            <form action="{{ route('delete.transaction', $transaction->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> <span
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline cursor-pointer">Delete</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4 text-center text-lg" colspan="4">
                            Masih belum ada transaksi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
