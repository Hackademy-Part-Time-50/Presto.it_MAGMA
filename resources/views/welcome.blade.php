<x-layouts.layout>


    <header class="container-fluid">
    
        <div class="row">
                <div class="col-12 col-md-6 ">
                    
                </div>


                <div class="col-12 col-md-6 align-content-center text-center custom-header ">

                    <!-- Contenuto sopra l'immagine -->
                    
                        <div class="text-custom">
                            <p class="fs-3 text">{{__('ui.slogan_1')}}</p>
                            <p class="fs-3 text">{{__('ui.slogan_2')}},</p>
                            <p class="fs-1 text fw-bold">{{ config('app.name') }}!</p>
                            
                                @auth
                                    <a href="{{ route('create.article') }}" class="btn btn-custom-other">
                                        {{__('ui.create_announce')}}
                                    </a>
                                {{-- @else
                                    <a href="{{ route('login') }}" class="btn btn-custom-other">
                                        {{__('ui.login')}}
                                    </a> --}}
                                @endauth
                            
                        </div>
                    

                </div>


        </div>
    </header>


    <div class="container mt-5">
        <x-carousel :articles="$articles"/>
    </div>



    <div class="container align-content-center my-5">
        <div class="row">

           



            <div class="col-12 col-md-6 img-revisore">
                
                
               
              
        </div>
        
            <div class="col-12 col-md-6 mt-3 align-items-center text-center">
                
                    <h5>{{__('ui.want_become_revisor')}}</h5>
                    <p>{{__('ui.button_below')}}</p>
                    @auth
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('revisore.richiesta') }}" method="POST" class="w-50">
                        @csrf
                            <button type="submit" class="btn btn-custom-other">Diventa un revisore</button>
                        </form>
                    </div>    
                    @else
                        <a href="{{ route('login') }}" class="btn btn-custom-other">{{__('ui.become_revisor')}}</a>
                    @endauth
                  
            </div>
        </div>
    </div>

<x-success/>



</x-layouts.layout>






