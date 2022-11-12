<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Models\Ordered;
use App\Models\Ordered_Image;
use Illuminate\Support\Facades\Storage;

class OrderedImageController extends Controller
{
    private $ordered_Image;
    private $ordered;

    public function __construct(Ordered_Image $ordered_Image, Ordered $ordered)
    {
        $this->ordered_Image = $ordered_Image;
        $this->ordered = $ordered;
    }

    public function remove($imageId)
    {
        try {
            $image = $this->ordered_Image->find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
            return response()->json([
                'data' => [
                    'msg' => 'Image removida com sucesso',
                ]
            ], 200);
        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
    public function removeAll($orderedId)
    {
        try {
            $ordered = $this->ordered->Image()->find($orderedId);
            dd($ordered);
            $a = 0;
            while ($a <= 10) {
                $image = $this->ordered_Image->find($imageId[$a]);
                if ($image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }
                $a++;
            }
            return response()->json([
                'data' => [
                    'msg' => 'Image removida com sucesso',
                ]
            ], 200);
        } catch (\Throwable $th) {
            $message = new ApiMessages($th->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
