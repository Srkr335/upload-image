<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>





<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Upload product Images
                        <a href="{{ url('dashboard') }}" class="btn btn-primary float-end">Back </a>
                    </h4>
                </div>
                <div class="card-body">

                    <h5>Product Name: {{ $product->name }}</h5>


                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
