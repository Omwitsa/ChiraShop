@extends('reports.header')

@section('content')
    <div>
        <!-- Metadata Grid -->
        <div class="grid grid-cols-2 gap-8 mb-12">
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Billed To</h3>
                <p class="font-medium text-slate-800 mt-1">{{ $order->name ?? 'John Doe' }}</p>
                <p class="text-sm text-slate-500">johndoe@example.com</p>
            </div>
            <div class="text-right">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-400">Details</h3>
                <p class="text-sm text-slate-600 mt-1"><span class="font-medium text-slate-800">Date Issued:</span> July 12, 2026</p>
                <p class="text-sm text-slate-600"><span class="font-medium text-slate-800">Due Date:</span> July 26, 2026</p>
            </div>
        </div>

        <!-- Main Items Table -->
        <table class="w-full text-left border-collapse mb-12">
            <thead>
                <tr class="border-b border-slate-300 text-slate-700 text-sm font-semibold">
                    <th class="py-3">Description</th>
                    <th class="py-3 text-center w-24">Qty</th>
                    <th class="py-3 text-right w-32">Price</th>
                    <th class="py-3 text-right w-32">Amount</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 text-sm">
                <tr>
                    <td class="py-4">
                        <p class="font-medium text-slate-900">Premium SaaS Subscription</p>
                        <p class="text-xs text-slate-500 mt-0.5">Monthly billing cycle (Enterprise tier)</p>
                    </td>
                    <td class="py-4 text-center text-slate-600">1</td>
                    <td class="py-4 text-right text-slate-600">$499.00</td>
                    <td class="py-4 text-right font-medium text-slate-900">$499.00</td>
                </tr>
            </tbody>
        </table>

        <!-- Force a New Page manually if your template demands multi-page tracking -->
        {{-- @pageBreak --}}

        <!-- Totals Area -->
        <div class="flex justify-end">
            <div class="w-64 space-y-2 text-sm">
                <div class="flex justify-between text-slate-600">
                    <span>Subtotal</span>
                    <span>$499.00</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Tax (0%)</span>
                    <span>$0.00</span>
                </div>
                <div class="flex justify-between border-t border-slate-200 pt-2 font-semibold text-slate-900 text-base">
                    <span>Total Due</span>
                    <span>$499.00</span>
                </div>
            </div>
        </div>
    </div>
@stop


