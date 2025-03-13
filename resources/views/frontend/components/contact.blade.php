<form id="contactForm" action="{{ route('contact.send') }}" method="post">
    @csrf
    <div class="row g-3">
        <div class="{{ Route::is('service.detail') ? 'col-md-6' : 'col-md-12' }}">
            <div class="form-floating">
                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name" placeholder="Your Name" />
                <label for="name">Your Name</label>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class=" {{ Route::is('service.detail') ? 'col-md-6' : 'col-md-12' }}">
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" placeholder="Your Email" />
                <label for="email">Your Email</label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="subject"
                    name="phone" value="{{ old('phone') }}" placeholder="Phone no." />
                <label for="subject">Phone no.</label>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Leave a message here" id="message"
                    name="message" style="height: 100px" value="{{ old('email') }}">{{ old('message') }}</textarea>
                <label for="message">Message</label>
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary py-3 px-5" type="submit">
                Send Message
            </button>
        </div>
    </div>
</form>
