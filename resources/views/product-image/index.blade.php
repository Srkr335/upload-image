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


                    <div class="mb-3">
                        <h5>Product Name: {{ $product->name }}</h5>
                        <hr>
                    </div>


                    @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <form action="{{ url('/categories/'. $product->id.'/upload') }}" method="post" enctype="multipart/form-data">
                            @csrf









                            <div class="mb-3">
    <label >Upload Images(Max:20 images only)</label>
    <input type="file" name="images[]" multiple class="form-control"/>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-primary">Upload</button>
</div>
            </form>

            <div class="col-md-12 mt-4">
                @foreach ($productImages as $prodImg)
                    <img src="{{ asset($prodImg->image) }}" class="border p-2 m-3 d-inline-block" style="width: 100px; height: 100px;" alt="img">
              <a href="{{ url('product-image/'.$prodImg->id.'/delete') }}" class="btn btn-danger">Delete/Remove</a>
               
               
                    @endforeach
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
