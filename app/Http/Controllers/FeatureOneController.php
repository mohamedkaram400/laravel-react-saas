<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\UsedFreature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FeatureResource;

class FeatureOneController extends Controller
{
    protected ?Feature $feature = null;

    public function __constructor()
    {
        $this->feature = Feature::where('route_name', 'feature1.index')
             ->where('active', true)->firstOrFail();
    }

    public function index()
    {
        return inertia('Feature1/Index', [
            'feature' => new FeatureResource($this->feature),
            'answer'  => session('answer')
        ]);

    }

    public function calculate(Request $request)
    {
        $user = Auth::user();
        if ($user->avlilable_credits < $this->feature->required_credits) {
            return back();
        }

        $data = $request->validate([
            'number1'   => ['required', 'numeric'],
            'number2'   => ['required', 'numeric'],
        ], $request->all());

        $number1 = (float) $data['number1'];
        $number2 = (float) $data['number2'];

        $user->decreaseCredits($this->feature->avilable_credits);

        UsedFreature::create([
            'user_id'       => $user->id,
            'data'          => $data,
            'feature_id'    => $this->feature->id,
            'credits'       => $this->feature->required_credits,
        ]);

        return to_route('feature1.index')->with('answer', $number1 + $number2);

    }
}
