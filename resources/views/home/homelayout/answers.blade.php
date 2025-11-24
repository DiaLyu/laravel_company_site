<div class="lonyo-section-padding4">
    <div class="container">

        @php
            $title = App\Models\Title::find(1);
            $faq = App\Models\Faq::latest()->get();
        @endphp

        <div class="lonyo-section-title center">
            <h2 id="answers-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" 
                data-id="{{ $title->id }}">{{ $title->answers }}</h2>
        </div>
        <div class="lonyo-faq-shape"></div>
        <div class="lonyo-faq-wrap1">

            @foreach($faq as $question)
                <div class="lonyo-faq-item item2 open" data-aos="fade-down" data-aos-duration="500">
                    <div class="lonyo-faq-header">
                        <h4>{{ $question->title }}</h4>
                        <div class="lonyo-active-icon">
                            <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                            <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="lonyo-faq-body body2">
                        <p>{{ $question->description }}</p>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
            <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
        </div>
    </div>
</div>

{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const titleElement = document.getElementById("answers-title");

        function saveChanges(element){
            let answersId = element.dataset.id;
            let field = element.id === "answers-title" ? "answers" : "";
            let newValue = element.innerText.trim();
            
            fetch(`/edit-answers/${answersId}`, {
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
        titleElement.addEventListener("blur", function(){
            saveChanges(titleElement);
        });
    })
</script>