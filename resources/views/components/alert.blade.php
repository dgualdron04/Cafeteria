@props(['color' => 'red'])

<div class="w-full flex flex-wrap justify-end absolute p-10 z-10 text-white font-bold">
    <div class="px-5 py-3 rounded-l-lg bg-{{$color}}-600 border-l-2 border-t-2 border-b-2 border-{{$color}}-800">
        <p>!</p>
    </div>
    <div class="bg-{{$color}}-500 px-20 py-3 rounded-r-lg border-r-2 border-t-2 border-b-2 border-{{$color}}-800">
        <p>La acción se completo satisfactoriamente.</p>
    </div>
</div>