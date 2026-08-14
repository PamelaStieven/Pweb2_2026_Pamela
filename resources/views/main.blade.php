<!doctype html>
<html lang="pt-BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Atual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>

    <!-- SIDEBAR -->
    <div>
        @yield('sidebar')
    </div>

    <!-- MAIN CONTENT -->
    <main class="container">
        <div class="col-12 col-md-9">

            @if(session('success'))
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" alert-dismissable fade show" role="alert">
                    {{ session('error') }}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif
        </div>

        @if($errors->any())
            <div class="alert alert-danger" alert-dismissable fade show" role="alert">
                <b>Por favor, verifique os erros abaixo:</b>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ error }}</li>
                    @endforeach
                </ul>
        @endif

        @yield('conteudo') <!-- Aqui ele chama uma estrutura já feita. -->
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
