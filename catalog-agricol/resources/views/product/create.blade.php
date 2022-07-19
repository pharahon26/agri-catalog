@extends('layout.layout')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function (e) {


            $('#image').change(function(){

                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>
    <div class="container justify-content-center">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col p-3 bg-light">

            <h2>Nouveau produit</h2>

            <form action="/product" method="post" enctype="multipart/form-data">
                @csrf
                <img id="preview-image" src="#" alt="preview image" style="max-height: 250px;">
                <label for="image">image</label>
                <input type="file"id="image" name="image" accept="image/*">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <label for="price">Prix</label>
                <input type="number" name="price" id="price">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" id="quantity">
                <label for="quantity_type">unités</label>
                <select name="quantity_type" id="quantity_type">
                    <option value="unité">unité</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                </select>
                <label for="category">Catégorie</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <input type="submit" value="Enregistrer">
            </form>

            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
