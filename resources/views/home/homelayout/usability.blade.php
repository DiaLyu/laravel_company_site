@php
    $usability = App\Models\Usability::find(1);
    $connect = App\Models\Connect::latest()->get();
@endphp

<div class="lonyo-section-padding bg-heading position-relative sectionn">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="lonyo-video-thumb">
                <img src="{{ asset($usability->image) }}" alt="">
                <a class="play-btn video-init" href="{{ $usability->youtube }}">
                    <img src="{{ asset('frontend/assets/images/v1/play-icon.svg') }}" alt="">
                    <div class="waves wave-1"></div>
                    <div class="waves wave-2"></div>
                    <div class="waves wave-3"></div>
                </a>
                </div>
            </div>
            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-default-content lonyo-video-section pl-50" data-aos="fade-up" data-aos-duration="500">
                <h2>{{ $usability->title }}</h2>
                <p>{{ $usability->description }}</p>
                <div class="mt-50" data-aos="fade-up" data-aos-duration="700">
                    <a class="lonyo-default-btn video-btn" href="{{ $usability->link }}">Contact with us</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($connect as $key => $item)
                <div class="col-xl-4 col-md-6">
                    <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="500">
                    <div class="lonyo-process-number">
                        <img src="{{ asset('frontend/assets/images/v1/n' . $key+1 . '.svg') }}" alt="">
                    </div>
                    <div class="lonyo-process-title">
                        <h4 class="connect-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" 
                            data-id="{{ $item->id }}">{{ $item->title }}</h4>
                    </div>
                    <div class="lonyo-process-data">
                        <p class="connect-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" 
                            data-id="{{ $item->id }}">{{ $item->description }}</p>
                    </div>
                    </div>
                </div>
            @endforeach

            <div class="border-bottom" data-aos="fade-up" data-aos-duration="500"></div>
        </div>
    </div>
</div>

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        function saveChanges(element){
            let connectId = element.dataset.id;
            let field = element.classList.contains("connect-title") ? "title" : "description";
            let newValue = element.innerText.trim();

            fetch(`/edit-connect/${connectId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"), 
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ [field]:newValue })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    console.log(`${field} updated successfully`)
                }
            })
            .catch(error => console.log("Error:", error));
        }

        // Auto save on Enter Key
        document.addEventListener("keydown", function(e){
            if(e.key === "Enter"){
                e.preventDefault();
                saveChanges(e.target);
            }
        });

        // Auto save on Losing focus
        document.querySelectorAll(".connect-title, .connect-description").forEach(el => {
            el.addEventListener("blur", function(){
                saveChanges(el);
            });
        });
    })
</script>