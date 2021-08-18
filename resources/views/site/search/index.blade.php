@extends('layouts.site')
@section('links')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



@endsection
@section('content')
    <main>
        <h2>Оттдается аякс данные. Нужно чтоб отддавались в модальном окне в хедере И правильный нужно составить запрос на селект2контроллер</h2>

        <select class="livesearch form-control" name="livesearch"></select>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.livesearch').select2({
            placeholder: 'Select movie',
            ajax: {
                url: "{{ route('ajax-autocomplete-search')}}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // debugger;
                    console.log(data);
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                errors() {
                    debugger;
                },
                cache: true
            }
        });
    </script>
@endsection
