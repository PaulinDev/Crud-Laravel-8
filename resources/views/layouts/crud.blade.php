<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            @yield('lista-carro')
            @yield('ver')
            @yield('edita-criar')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('.apagar').click(function (event) {
            event.preventDefault();
            id_carro = $(this).attr('id');
            nome_carro = $('.nome-' + id_carro).text();
            url = $(this).attr('href');
            token = $('input[name="_token"]').val();
            deletar = confirm('Tem certeza de que quer deletar o ' + nome_carro + ' ?');

            if (deletar) {
                $.ajax({
                    method: "GET",
                    url: url,
                    headers: {
                        'X-CSRF-Token': token
                    },
                }).done(function () {
                    alert('O Carro ['+nome_carro+'] foi excluído!');
                    window.location.href = 'dashboard';
                })
            }
        })
    });
</script>
</body>
</html>
