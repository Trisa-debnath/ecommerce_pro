<?php
use Livewire\Volt\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

new #[Layout('components.home.shop_layout')]
#[Middleware('auth')]
class extends Component {
    public function with(): array
    {
        return [
            'testimonials' => Testimonial::latest()->take(6)->get(),
        ];
    }
}
?>

<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>What Says Our Customers</h2>
        </div>
        <div class="row">
            @forelse($testimonials as $client)
            <div class="col-md-4 mt-4">
                <div class="box p-4 border shadow-sm text-center">
                    <div class="img-box mb-3">
                        <img src="{{ asset('home/images/' . $client->image) }}" class="rounded-circle" width="80" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $client->name }}</h5>
                        <h6>{{ $client->designation }}</h6>
                        <p class="mt-2" style="font-style: italic;">"{{ $client->comment }}"</p>
                        <div class="stars text-warning">
                            @for($i=0; $i<$client->rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center w-100">No testimonials found.</p>
            @endforelse
        </div>
    </div>
</section>
