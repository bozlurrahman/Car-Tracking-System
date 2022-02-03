<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCar;
use App\Http\Requests\UpdateCar;
use App\Http\Resources\Car as CarResource;
use App\Models\Car;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CarResource::collection(
            QueryBuilder::for(Car::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter(['title', 'description', 'author'])),
                    AllowedFilter::exact('id'),
                    AllowedFilter::partial('title'),
                    AllowedFilter::partial('author'),
                    AllowedFilter::exact('commentable'),
                ])
                ->allowedSorts(['isbn', 'title', 'author', 'price', 'publication_date'])
                ->allowedIncludes([])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return CarResource
     */
    public function show(Car $car)
    {
        return new CarResource($car->load([]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CarResource
     */
    public function store(StoreCar $request)
    {
        $car = Car::create($request->all());

        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return CarResource
     */
    public function update(UpdateCar $request, Car $car)
    {
        $car->update($request->all());

        return new CarResource($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->noContent();
    }
}
