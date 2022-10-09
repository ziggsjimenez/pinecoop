@if (session()->has('message'))
    <div class="bg-{{session('message-type') =='danger' ? 'red':'teal'}}-100 border-{{session('message-type') =='danger' ? 'red':'teal'}}-500 text-{{session('message-type') =='danger' ? 'red':'teal'}}-900 rounded-b border-t-4 px-4 py-3 shadow-md my-3"
         role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{!! session('message') !!}</p>
            </div>
        </div>
    </div>
@endif
