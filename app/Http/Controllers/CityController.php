<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCity;
use App\Http\Requests\UpdateCity;
use App\Http\Resources\City as CityResource;
use App\Models\City;
use Okami101\LaravelAdmin\Filters\SearchFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(City::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CityResource::collection(
            QueryBuilder::for(City::class)
                ->allowedFilters([
                    AllowedFilter::custom('q', new SearchFilter(['name', 'description'])),
                    AllowedFilter::exact('id'),
                    AllowedFilter::partial('name'),
                    AllowedFilter::exact('active'),
                ])
                ->allowedSorts(['name', 'created_at', 'updated_at'])
                ->allowedIncludes(['media'])
                ->exportOrPaginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return CityResource
     */
    public function show(City $city)
    {
        return new CityResource($city->load(['media']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CityResource
     */
    public function store(StoreCity $request)
    {
        $city = City::create($request->all());

        return new CityResource($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return CityResource
     */
    public function update(UpdateCity $request, City $city)
    {
        $city->update($request->all());

        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->noContent();
    }
}
