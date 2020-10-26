<div class="card">
    <div class="card-body">
        @if(! auth()->user()->two_factor_secret)
            {{-- Enable 2FA --}}
            <p class="text-primary">You have to verify your password. When you enable this feature.</p>
            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    {{ __('Enable Two-Factor') }}
                </button>
            </form>
        @else
            {{-- Disable 2FA --}}
            <form method="POST" action="{{ url('user/two-factor-authentication') }}" class="mb-4">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-primary">
                    {{ __('Disable Two-Factor') }}
                </button>
            </form>

            <hr>

            @if(session('status') == 'two-factor-authentication-enabled')
                {{-- Show SVG QR Code, After Enabling 2FA --}}
                <div class="mb-3 text-danger lead">
                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application. ( It will go away after refreshing the page. )') }}
                </div>

                <div class="mb-4">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>

                <hr>
            @endif



            {{-- Show 2FA Recovery Codes --}}
            <div class="mb-3 lead">
                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
            </div>

            <div class="mb-4 lead text-primary">
                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>

            <hr>

            {{-- Regenerate 2FA Recovery Codes --}}
            <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                @csrf

                <button type="submit" class="btn btn-primary">
                    {{ __('Regenerate Recovery Codes') }}
                </button>
            </form>
        @endif
    </div>
</div>

