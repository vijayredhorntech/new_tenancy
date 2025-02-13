<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class flightSerach extends Component
{
    /**
     * Create a new component instance.
     */
    public $cabinClasses = [
        'Economy' => 'Economy',
        'PremiumEconomy' => 'Premium Economy',
        'Business' => 'Business',
        'First' => 'First',
    ];
    public $currencies = [
        'GBP' => 'GBP',
        'USD' => 'USD',
        'EUR' => 'EUR',
        'INR' => 'INR',
    ];
    
    public $fareTypes = [
        'PublicFaresOnly' => 'Public Fares Only',
        'PrivateFaresOnly' => 'Private Fares Only',
    ];
    public function __construct(public $defaults = [])
    {
        // $this->airlines = Airline::all()->pluck('name', 'iata');
        if ($this->defaults == []) {
            $this->defaults = [
                'origin' => old('origin'),
                'destination' => old('destination'),
                'departureDate' => old('departureDate'),
                'returnDate' => old('returnDate'),
                'flexi' => old('flexi'),
                'type' => old('type') ?? 'return',
                'adult' => old('adult') ?? 1,
                'child' => old('child') ?? 0,
                'infant' => old('infant') ?? 0,
                'cabinClass' => old('cabinClass') ?? 'Economy',
                'currency' => old('currency') ?? 'GBP',
                'fareType' => old('fareType') ?? 'PublicFaresOnly',
                'preferredAirline' => old('preferredAirline') ?? '',
                'directFlight' => old('directFlight') ?? false,
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.flight-serach');
    }
}
