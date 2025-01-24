<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Car;
use Doctrine\Persistence\ManagerRegistry;

class UploadController extends AbstractController
{
    #[Route('/edit/{id}', name: 'edit_car_by_id', methods: ['POST'])]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine): Response
    {
        // Fetch the car by its ID
        $car = $doctrine->getRepository(Car::class)->find($id);
    
        // If the car is not found, return a 404 Not Found response
        if (!$car) {
            return $this->json(['message' => 'Car not found'], 404);
        }

        $description = $request->request->get('description');
        $Argument = $request->request->get('Argument');
        $Place = $request->request->get('Place');
        $Transmission = $request->request->get('Transmission');
        $Carburant = $request->request->get('Carburant');
        $Garantie = $request->request->get('Garantie');
        $Kilo = $request->request->get('Kilo');
        $Annee = $request->request->get('Annee');
        $title = $request->request->get('title');
        $Prix = $request->request->get('Prix');
        $modele = $request->request->get('modele');
        $images = $request->files->get('images');


        // Check each field and update only if a new value is provided
        if ($description != 'undefined') {
            $car->setDescription($request->request->get('description'));
        }
        if ($Argument != 'undefined') {
            $car->setArgument($request->request->get('Argument'));
        }
        if ($Place != 'undefined') {
            $car->setPlace($request->request->get('Place'));
        }
        if ($Transmission != 'undefined') {
            $car->setTransmission($request->request->get('Transmission'));
        }
        if ($Carburant != 'undefined') {
            $car->setCarburant($request->request->get('Carburant'));
        }
        if ($Garantie != 'undefined') {
            $car->setGarantie($request->request->get('Garantie'));
        }
        if ($Kilo != 'undefined') {
            $car->setKilo($request->request->get('Kilo'));
        }
        if ($Annee != 'undefined') {
            $car->setAnnee($request->request->get('Annee'));
        }
        if ($title != 'undefined') {
            $car->setName($request->request->get('title'));
        }
        if ($Prix != 'undefined') {
            $car->setPrice($request->request->get('Prix'));
        }
        if ($modele != 'undefined') {
            $car->setModele($request->request->get('modele'));
        }

        // Handle images if they are part of the update
        $images = $request->files->get('images');
        if ($images && count($images) > 0) {
            $imagePaths = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads',
                    $imageName
                );
                $imagePaths[] = $imageName;
            }
            $car->setImagePaths($imagePaths);  // Update image paths only if new images are uploaded
        }
    
        // Persist the updated entity
        $entityManager = $doctrine->getManager();
        $entityManager->persist($car);
        $entityManager->flush();
    
        return $this->json(['message' => 'Car updated successfully']);
    }
    

    #[Route('/upload')]
    public function upload(Request $request, ManagerRegistry $doctrine): Response
    {
        $description = $request->request->get('description');
        $Argument = $request->request->get('Argument');
        $Place = $request->request->get('Place');
        $Transmission = $request->request->get('Transmission');
        $Carburant = $request->request->get('Carburant');
        $Garantie = $request->request->get('Garantie');
        $Kilo = $request->request->get('Kilo');
        $Annee = $request->request->get('Annee');
        $title = $request->request->get('title');
        $Prix = $request->request->get('Prix');
        $modele = $request->request->get('modele');
        $images = $request->files->get('images');
        // Handle description and save to database
        // Save images to server and get their paths
        $imagePaths = [];
        foreach ($images as $image) {
            $imageName = uniqid() . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('kernel.project_dir') . '/public/uploads',
                $imageName
            );
            $imagePaths[] = $imageName; // Adjust the path as per your directory structure
        }

        // Save $description and $imagePaths to your database
        // Example: Assuming you have an entity named "YourEntity"
        $carEntity = new Car();
        $carEntity->setDescription($description);
        $carEntity->setImagePaths($imagePaths);
        $carEntity->setArgument($Argument);
        $carEntity->setPlace($Place);
        $carEntity->setTransmission($Transmission);
        $carEntity->setCarburant($Carburant);
        $carEntity->setGarantie($Garantie);
        $carEntity->setKilo($Kilo);
        $carEntity->setAnnee($Annee);
        $carEntity->setCarburant($Carburant);
        $carEntity->setName($title);
        $carEntity->setPrice($Prix);
        $carEntity->setModele($modele);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($carEntity);
        $entityManager->flush();

        return $this->json(['message' => 'Data uploaded successfully']);
    }

    #[Route('/get_cars', name: 'get_all_cars', methods: ['GET'])]
    public function getAllCars(ManagerRegistry $doctrine): Response
    {
        // Fetch all cars
        $cars = $doctrine->getRepository(Car::class)->findAll();
    
        // Prepare response data
        $responseData = [];
        foreach ($cars as $car) {
            $carData = [
                'id' => $car->getId(),
                'make' => $car->getName(),
                'description' => $car->getDescription(),
                'modele' => $car->getModele(),
                'year' => $car->getAnnee(),
                'price' => $car->getPrice(),
                'kilo' => $car->getKilo(),
                'garantie' => $car->getGarantie(),
                'carburant' => $car->getCarburant(),
                'transmission' => $car->getTransmission(),
                'place' => $car->getPlace(),
                'config' => $car->getArgument(),
                'images' => [],
            ];
    
            // Retrieve the serialized image paths from the entity
            $imagePathsSerialized = $car->getImagePaths();
    
            // Check if there is at least one image and load only the first one
            if (!empty($imagePathsSerialized)) {
                $firstImage = $imagePathsSerialized[0]; // Get the first image
                $imagePath = $this->getParameter('kernel.project_dir') . '/public/uploads/' . $firstImage;
    
                // Check if file exists and is readable
                if (is_readable($imagePath)) {
    
                    // Construct image data array for the first image
                    $imageInfo = [
                        'name' => $firstImage,
                        'type' => 'jpeg', // Consider dynamically determining the MIME type
                    ];
    
                    $carData['images'][] = $imageInfo;
                }
            }
    
            $responseData[] = $carData;
        }
    
        $response = $this->json($responseData);
    
        return $response;
    }

    #[Route('/get_car/{id}', name: 'get_car_by_id', methods: ['GET'])]
    public function getCar(int $id, ManagerRegistry $doctrine): Response
    {
        // Fetch the car by its ID
        $car = $doctrine->getRepository(Car::class)->find($id);

        // If the car is not found, return 404 Not Found response
        if (!$car) {
            return $this->json(['message' => 'Car not found'], 404);
        }

        // Prepare response data
        $carData = [
            'id' => $car->getId(),
            'make' => $car->getName(),
            'description' => $car->getDescription(),
            'modele' => $car->getModele(),
            'year' => $car->getAnnee(),
            'price' => $car->getPrice(),
            'kilo' => $car->getKilo(),
            'garantie' => $car->getGarantie(),
            'carburant' => $car->getCarburant(),
            'transmission' => $car->getTransmission(),
            'place' => $car->getPlace(),
            'config' => $car->getArgument(),
            'images' => [],
        ];

        // Retrieve the serialized image paths from the entity
        $imagePathsSerialized = $car->getImagePaths();

        foreach ($imagePathsSerialized as $image) {
            // Load the image file
            $imagePath = $this->getParameter('kernel.project_dir') . '/public/uploads/' . $image;

            // Encode the image file to base64
            $imageData = base64_encode(file_get_contents($imagePath));

            // Construct image data array
            $imageInfo = [
                'name' => $image,
                'type' => 'jpeg',
                'data' => $imageData,
            ];

            $carData['images'][] = $imageInfo;
        }

        $response = $this->json($carData);

        return $response;
    }
}
