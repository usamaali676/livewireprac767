@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Holiday Cycle
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    {{-- <form action="{{route('vehicle.update',$vehicle->id)}}" method="POST"> --}}
                    <form action="{{route('holiday.store')}}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label for="regular-form-3" class="form-label">Name</label>
                                            <select id="user_select"data-placeholder="Select User" class="tom-select w-full" name="user_id">
                                                @foreach ($user as $item)
                                                <option>Please Select</option>
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label for="regular-form-3" class="form-label">Year</label>
                                        <input id="regular-form-3" name="year" type="text"  class="form-control" placeholder="Holiday Year" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="regular-form-3" class="form-label">Total</label>
                                    <input id="regular-form-3" name="total" type="text"  class="form-control" placeholder="Total Holidays" >
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="vehicle-type" class="form-label">Remaining</label>
                                    <input id="regular-form-3" name="remaining" type="number"   class="form-control" placeholder="Remaining Holidays">

                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
@section('js')
<script>
    $(document).ready(function(){
      $('input.month-count').change(function(){
        jan = $("input[name='jan']").val();
        feb = $("input[name='feb']").val();
        mar = $("input[name='mar']").val();
        apr = $("input[name='apr']").val();
        may = $("input[name='may']").val();
        jun = $("input[name='jun']").val();
        jul = $("input[name='jul']").val();
        aug = $("input[name='aug']").val();
        sep = $("input[name='sep']").val();
        oct = $("input[name='oct']").val();
        nov = $("input[name='nov']").val();
        dec = $("input[name='dec']").val();
        // var sum = jan + feb + mar + apr + may + jun + jul + aug + sep + oct + nov + dec ;
        var sum = parseInt(jan) + parseInt(feb) + parseInt(mar) + parseInt(apr) +
           parseInt(may) + parseInt(jun) + parseInt(jul) + parseInt(aug) +
           parseInt(sep) + parseInt(oct) + parseInt(nov) + parseInt(dec);
        total =  $("input[name='total']").val();
        if(sum > total)
        {
            alert("You Don't Have Enough Remainnigs Holidays!");
        }
        // alert(sum);
      });
    });
</script>
@endsection
