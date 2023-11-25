<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Product</title>
    <style>
        #container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            
        }
        form .delete{
            background: none;
            background-color: red;
            padding: 3px 6px;
            border-radius: 10px;
            color : white;
            cursor: pointer;
        }
        .add{
            margin-bottom: 20px
        }
        .add, .edit{
            background-color: rgb(17, 101, 17);
            padding: 5px 10px;
            border-radius: 10px;
            color : white
        }
        th{
            border-bottom: 2px solid rgb(81, 81, 81);
        }
        th, td{
            padding: 10px
        }
    </style>
</head>
<body>
    <x-app-layout>
    <div id="container">
    <a href="{{route('product.create')}}" class="add">Add a product</a>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td><a href="{{route('product.edit', ['product'=> $product])}}" class="edit">Edit</a></td>
                    <td>
                        <form action="{{route('product.delete', ['product'=> $product])}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
    </x-app-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session()->has('success'))
        <script>
            toastr.options = {
                "progressBar" : true,
            }
            toastr.success("{{Session::get('success')}}")
        </script>
    @endif
</body>
</html>