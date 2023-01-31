<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{$invoice->id}}</td>
                <td class="border px-4 py-2">{{$invoice->user->name}}</td>
                <td class="border px-4 py-2">{{date('F j, Y', strtotime($invoice->due_date))}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['total']}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['paid']}}</td>
                <td class="border px-4 py-2 text-center">${{$invoice->amount()['due']}}</td>
                <td class="border px-4 py-2 flex justify-center items-center">
                    <a href="{{route('invoice-show', $invoice->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <a href="{{route('invoice-show', $invoice->id)}}" class="px-2">
                        @include('components.icons.eye')
                    </a>
                    <form onsubmit="return confirm('Are you sure?')" wire:submit.prevent="deleteInvoice({{$invoice->id}})" class="flex items-center">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$invoices->links()}}
    </div>
</div>
