<!-- Services section -->
<div class="services-section spad">
    <div class="container">
        <div class="section-title dark">
            <h2>{!! App\Helper\ChangeColor::color(($homeElement->titreService))!!}</h2>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <!-- single service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <div class="icon">
                        <i class="{{$service->icon->icon}}"></i>
                    </div>
                    <div class="service-text">
                        <h2>{{$service->titre}}</h2>
                        <p>{{$service->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
                <div class="d-flex justify-content-center text-center">
                    {{Request::route()->getName()=='servicePage.index'? $services->links():''}}
                </div>
               
        <div class="text-center">
            <a href="{{route('servicePage.index')}}" class="site-btn">Browse</a>
        </div>
    </div>
</div>
<!-- services section end -->
