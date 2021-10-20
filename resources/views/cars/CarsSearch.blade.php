<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('CarsSearch') }}" method="POST">
                    <div class="row">Wyszukiwarka Pojazdów</div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="cars_brands_id"><strong>Marka</strong></label>
                            <select class="form-select" name="cars_brands_id" id="cars_brands_id">
                                <option value="" diabled selected="">Wybierz markę</option>
                                @foreach($brands as $brand)

                                <option {{ old('cars_brands_id') == $brand->id ? "selected" : "" }}
                                    value="{{ $brand->id }}">{{ $brand->name }}</option>


                                {{-- <option value="{{$brand->id}}"
                                {{ ($brand->id == $content->cars_brands_id ? 'selected' : '') }} >{{$brand->name}}
                                </option> --}}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="cars_models_id"><strong>Model</strong></label>
                            <select class="form-select" name="cars_models_id" id="cars_models_id">
                                <option value="" diabled selected="">Wybierz najpierw markę</option>

                                {{-- <option value="{{$model->id}}"
                                {{ ($model->id == $content->cars_models_id ? 'selected' : '') }} >{{$model->name}}
                                </option> --}}

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="cars_models_id"><strong>Cena</strong></label>
                            <input class="typeahead form-control" type="text">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="cars_models_id"><strong>Rok produkcji</strong></label>
                            <div class="DatePickerDiv" id="DatePickerDiv" name="DatePickerDiv"></div>
                        </div>
                    </div>


                    <div>
                       
                        
                        <label class="brand"><strong>Nadwozie:</strong></label>
                        


                    </div>
                    <button type="sender" class="btn-primary">Szukaj</button>

                </form>
            </div>
        </div>


    </div>
</div>


    @section('java_script')

    <script type="text/javascript">
        $(document).ready(function () {





            $(document).on('change', '#cars_brands_id', function (e) {
                //  console.log(e);    
                var cat_id = e.target.value;
                $.get('/internal-api/cars/' + cat_id, function (data) {
                    $('#cars_models_id').empty();
                    $.each(data, function (index, subCatObj) {
                        $('#cars_models_id').append('<option value="' + subCatObj.id +
                            '">' + subCatObj.name + '</option>');
                    });
                });
            });
        });

    </script>

    @endsection
