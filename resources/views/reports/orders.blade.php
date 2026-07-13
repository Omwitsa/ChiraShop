@extends('reports.header')

@section('content')
    <div>
        <!-- <div class="flex justify-between items-start border-b border-slate-200 pb-8 mb-8">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900">INVOICE</h1>
                <p class="text-sm text-slate-500 mt-1">#INV-2026-0042</p>
            </div>
            <div class="text-right">
                <h2 class="font-semibold text-slate-900">Your Company Inc.</h2>
                <p class="text-sm text-slate-500">123 Innovation Way</p>
                <p class="text-sm text-slate-500">Tech City, TC 94016</p>
            </div>
        </div> -->

        <div class="grid grid-cols-2 gap-8 mb-12">
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Billed To</h3>
                <p class="font-medium text-slate-800 mt-1">{{ $order->name }}</p>
                <p class="text-sm text-slate-500">{{ $order->emailRecepients }}</p>
            </div>
            <div class="text-right">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Details</h3>
                <p class="text-sm text-slate-600 mt-1"><span class="font-medium text-slate-800">Order Date:</span> {{ $order->orderDate }} </p>
                <!-- <p class="text-sm text-slate-600"><span class="font-medium text-slate-800">Due Date:</span> July 26, 2026</p> -->
            </div>
        </div>

        <!-- Main Items Table -->
        <table class="w-full text-left border-collapse mb-12">
            <thead>
                <tr class="border-b border-slate-300 text-slate-700 text-sm font-semibold">
                    <th class="py-3">Product</th>
                    <th class="py-3 text-center w-24">Quantity</th>
                    <th class="py-3 text-right w-32">Unit Price</th>
                    <th class="py-3 text-right w-32">Amount</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200 text-sm">
                @foreach ($orderItems as $line)
                    <tr>
                        <!-- <td class="py-4">
                            <p class="font-medium text-slate-900">Premium SaaS Subscription</p>
                            <p class="text-xs text-slate-500 mt-0.5">Monthly billing cycle (Enterprise tier)</p>
                        </td> -->
                        <td class="py-4"> {{ $line->name }} </td>
                        <td class="py-4 text-center text-slate-600"> {{ $line->orderQuantity }} </td>
                        <td class="py-4 text-right text-slate-600">{{ $line->unit_price }} </td>
                        <td class="py-4 text-right font-medium text-slate-900"> {{ $line->lineTotal }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Force a New Page manually if your template demands multi-page tracking -->
        {{-- @pageBreak --}}

        <!-- Totals Area -->
        <div class="flex justify-end">
            <div class="w-64 space-y-2 text-sm">
                <div class="flex justify-between text-slate-600">
                    <span>Subtotal</span>
                    <span> {{ $order->amount }} </span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Tax (0%)</span>
                    <span>$0.00</span>
                </div>
                <div class="flex justify-between border-t border-slate-200 pt-2 font-semibold text-slate-900 text-base">
                    <span>Total Due</span>
                    <span> {{ $order->amount }} </span>
                </div>
            </div>
        </div>
    </div>
@stop


