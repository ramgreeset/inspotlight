<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Event\StoreRequest;
use App\Http\Requests\Api\Event\UpdateRequest;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use App\Services\VkApiService;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function index()
    {
        $inSpotlightGroups = VkApiService::groupGet(861493961);
        foreach ($inSpotlightGroups as $group){
            $groupPost = VkApiService::wallGet($group['id'], 1);
            echo '<b>' . $group['name'] . '</b>';
            echo '<br>';
            echo $groupPost[0]['text'];
            echo '<br>';
            echo '<br>';
        }


        dd("End");
        return EventResource::collection(Event::all())->resolve();
    }

    public function show(Event $category)
    {
        return EventResource::make($category)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Event::create($data);
    }

    public function update(UpdateRequest $request, Event $category)
    {
        $data = $request->validated();
        $category->update($data);
    }

    public function destroy(Event $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'Удалено'
        ], Response::HTTP_OK);
    }
}
