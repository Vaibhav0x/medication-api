<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medication;
use App\Models\MedicationClass;
use App\Models\MedicationClassName;
use App\Models\Drug;

class MedicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data['medications'] as $med) {
            $medication = Medication::create();

            foreach ($med['medicationsClasses'] as $medClassData) {
                $medClass = $medication->medicationsClasses()->create();

                foreach ($medClassData as $classNameKey => $classNameItems) {
                    $className = $medClass->classNames()->create(['name' => $classNameKey]);

                    foreach ($classNameItems as $drugTypes) {
                        foreach ($drugTypes as $type => $drugs) {
                            foreach ($drugs as $drug) {
                                $className->drugs()->create([
                                    'type' => $type,
                                    'name' => $drug['name'],
                                    'dose' => $drug['dose'],
                                    'strength' => $drug['strength'],
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return response()->json(['message' => 'Data saved']);
    }

    public function index()
    {
        $result = [
            "medications" => Medication::with('medicationsClasses.classNames.drugs')->get()->map(function ($medication) {
                return [
                    "medicationsClasses" => $medication->medicationsClasses->map(function ($medClass) {
                        $classOutput = [];

                        foreach ($medClass->classNames as $className) {
                            $grouped = [];

                            foreach ($className->drugs as $drug) {
                                $grouped[$drug->type][] = [
                                    "name" => $drug->name,
                                    "dose" => $drug->dose,
                                    "strength" => $drug->strength
                                ];
                            }

                            $classOutput[$className->name] = [$grouped];
                        }

                        return $classOutput;
                    })
                ];
            })
        ];

        return response()->json($result);
    }
}

