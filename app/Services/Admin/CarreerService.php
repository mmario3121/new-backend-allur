<?php

namespace App\Services\Admin;

use App\Models\Carreer;
use App\Models\CarreerKz;
use App\Services\FileService;
use App\Services\TranslateService;
use App\Models\SEO;

class CarreerService
{
    protected FileService $fileService;
    protected TranslateService $translateService;

    public function __construct(FileService $fileService, TranslateService $translateService)
    {
        $this->fileService = $fileService;
        $this->translateService = $translateService;
    }

    public function create(array $data)
    {
         //10 blocks with image, title, description
        //4 cards
        $career =  Carreer::query()->create([
            'block1_title' => $data['block1_title'],
            'block1_text' => $data['block1_text'],
            'block1_image' => $this->fileService->saveFile($data['block1_image'], Carreer::IMAGE_PATH),
            'block2_title' => $data['block2_title'],
            'block2_text' => $data['block2_text'],
            'block2_image' => $this->fileService->saveFile($data['block2_image'], Carreer::IMAGE_PATH),
            'block3_title' => $data['block3_title'],
            'block3_text' => $data['block3_text'],
            'block3_image' => $this->fileService->saveFile($data['block3_image'], Carreer::IMAGE_PATH),
            'block4_title' => $data['block4_title'],
            'block4_text' => $data['block4_text'],
            'block4_image' => $this->fileService->saveFile($data['block4_image'], Carreer::IMAGE_PATH),
            'block5_title' => $data['block5_title'],
            'block5_text' => $data['block5_text'],
            'block5_image' => $this->fileService->saveFile($data['block5_image'], Carreer::IMAGE_PATH),
            'block6_title' => $data['block6_title'],
            'block6_text' => $data['block6_text'],
            'block6_image' => $this->fileService->saveFile($data['block6_image'], Carreer::IMAGE_PATH),
            'block7_title' => $data['block7_title'],
            'block7_text' => $data['block7_text'],
            'block7_image' => $this->fileService->saveFile($data['block7_image'], Carreer::IMAGE_PATH),
            'block8_title' => $data['block8_title'],
            'block8_text' => $data['block8_text'],
            'block8_image' => $this->fileService->saveFile($data['block8_image'], Carreer::IMAGE_PATH),
            'block9_title' => $data['block9_title'],
            'block9_text' => $data['block9_text'],
            'block9_image' => $this->fileService->saveFile($data['block9_image'], Carreer::IMAGE_PATH),
            'block10_title' => $data['block10_title'],
            'block10_text' => '',
            'block10_image' => $this->fileService->saveFile($data['block10_image'], Carreer::IMAGE_PATH),
            'block11_title' => $data['block11_title'],
            'block11_text' => $data['block11_text'],
            'block11_image' => $this->fileService->saveFile($data['block11_image'], Carreer::IMAGE_PATH),
            'card1_title' => $data['card1_title'],
            'card1_text' => $data['card1_text'],
            'card2_title' => $data['card2_title'],
            'card2_text' => $data['card2_text'],
            'card3_title' => $data['card3_title'],
            'card3_text' => $data['card3_text'],
            'card4_title' => $data['card4_title'],
            'card4_text' => $data['card4_text'],
        ]);

        $career_kz = CarreerKz::query()->create([
            'block1_title_kz' => $data['block1_title_kz'],
            'block1_text_kz' => $data['block1_text_kz'],
            'block2_title_kz' => $data['block2_title_kz'],
            'block2_text_kz' => $data['block2_text_kz'],
            'block3_title_kz' => $data['block3_title_kz'],
            'block3_text_kz' => $data['block3_text_kz'],
            'block4_title_kz' => $data['block4_title_kz'],
            'block4_text_kz' => $data['block4_text_kz'],
            'block5_title_kz' => $data['block5_title_kz'],
            'block5_text_kz' => $data['block5_text_kz'],
            'block6_title_kz' => $data['block6_title_kz'],
            'block6_text_kz' => $data['block6_text_kz'],
            'block7_title_kz' => $data['block7_title_kz'],
            'block7_text_kz' => $data['block7_text_kz'],
            'block8_title_kz' => $data['block8_title_kz'],
            'block8_text_kz' => $data['block8_text_kz'],
            'block9_title_kz' => $data['block9_title_kz'],
            'block9_text_kz' => $data['block9_text_kz'],
            'block10_title_kz' => $data['block10_title_kz'],
            'block10_text_kz' => '',
            'block11_title_kz' => $data['block11_title_kz'],
            'block11_text_kz' => $data['block11_text_kz'],            
            'card1_title_kz' => $data['card1_title_kz'],
            'card1_text_kz' => $data['card1_text_kz'],
            'card2_title_kz' => $data['card2_title_kz'],
            'card2_text_kz' => $data['card2_text_kz'],
            'card3_title_kz' => $data['card3_title_kz'],
            'card3_text_kz' => $data['card3_text_kz'],
            'card4_title_kz' => $data['card4_title_kz'],
            'card4_text_kz' => $data['card4_text_kz'],
        ]);

        return $career;
    }

    public function update(Carreer $carreer, array $data)
    {
        $carreer->block1_title = $data['block1_title'];
        $carreer->block1_text = $data['block1_text'];
        $carreer->block2_title = $data['block2_title'];
        $carreer->block2_text = $data['block2_text'];
        $carreer->block3_title = $data['block3_title'];
        $carreer->block3_text = $data['block3_text'];
        $carreer->block4_title = $data['block4_title'];
        $carreer->block4_text = $data['block4_text'];
        $carreer->block5_title = $data['block5_title'];
        $carreer->block5_text = $data['block5_text'];
        $carreer->block6_title = $data['block6_title'];
        $carreer->block6_text = $data['block6_text'];
        $carreer->block7_title = $data['block7_title'];
        $carreer->block7_text = $data['block7_text'];
        $carreer->block8_title = $data['block8_title'];
        $carreer->block8_text = $data['block8_text'];
        $carreer->block9_title = $data['block9_title'];
        $carreer->block9_text = $data['block9_text'];
        $carreer->block10_title = $data['block10_title'];
        $carreer->block10_text = '';
        $carreer->block11_title = $data['block11_title'];
        $carreer->block11_text = $data['block11_text'];
        $carreer->card1_title = $data['card1_title'];
        $carreer->card1_text = $data['card1_text'];
        $carreer->card2_title = $data['card2_title'];
        $carreer->card2_text = $data['card2_text'];
        $carreer->card3_title = $data['card3_title'];
        $carreer->card3_text = $data['card3_text']; 
        $carreer->card4_title = $data['card4_title'];
        $carreer->card4_text = $data['card4_text'];
        if (isset($data['block1_image'])) {
            $carreer->block1_image = $this->fileService->saveFile($data['block1_image'], Carreer::IMAGE_PATH, $carreer->block1_image);
        }
        if (isset($data['block2_image'])) {
            $carreer->block2_image = $this->fileService->saveFile($data['block2_image'], Carreer::IMAGE_PATH, $carreer->block2_image);
        }
        if (isset($data['block3_image'])) {
            $carreer->block3_image = $this->fileService->saveFile($data['block3_image'], Carreer::IMAGE_PATH, $carreer->block3_image);
        }
        if (isset($data['block4_image'])) {
            $carreer->block4_image = $this->fileService->saveFile($data['block4_image'], Carreer::IMAGE_PATH, $carreer->block4_image);
        }
        if (isset($data['block5_image'])) {
            $carreer->block5_image = $this->fileService->saveFile($data['block5_image'], Carreer::IMAGE_PATH, $carreer->block5_image);
        }
        if (isset($data['block6_image'])) {
            $carreer->block6_image = $this->fileService->saveFile($data['block6_image'], Carreer::IMAGE_PATH, $carreer->block6_image);
        }
        if (isset($data['block7_image'])) {
            $carreer->block7_image = $this->fileService->saveFile($data['block7_image'], Carreer::IMAGE_PATH, $carreer->block7_image);
        }
        if (isset($data['block8_image'])) {
            $carreer->block8_image = $this->fileService->saveFile($data['block8_image'], Carreer::IMAGE_PATH, $carreer->block8_image);
        }
        if (isset($data['block9_image'])) {
            $carreer->block9_image = $this->fileService->saveFile($data['block9_image'], Carreer::IMAGE_PATH, $carreer->block9_image);
        }
        if (isset($data['block10_image'])) {
            $carreer->block10_image = $this->fileService->saveFile($data['block10_image'], Carreer::IMAGE_PATH, $carreer->block10_image);
        }
        if (isset($data['block11_image'])) {
            $carreer->block11_image = $this->fileService->saveFile($data['block11_image'], Carreer::IMAGE_PATH, $carreer->block11_image);
        }

        $carreer_kz = CarreerKz::first();
        
        if(!$carreer_kz){
            $carreer_kz = new CarreerKz();
        }
            $carreer_kz->block1_title_kz = isset($data['block1_title_kz']) ? $data['block1_title_kz'] : '';
            $carreer_kz->block1_text_kz = isset($data['block1_text_kz']) ? $data['block1_text_kz'] : '';
            $carreer_kz->block2_title_kz = isset($data['block2_title_kz']) ? $data['block2_title_kz'] : '';
            $carreer_kz->block2_text_kz = isset($data['block2_text_kz']) ? $data['block2_text_kz'] : '';
            $carreer_kz->block3_title_kz = isset($data['block3_title_kz']) ? $data['block3_title_kz'] : '';
            $carreer_kz->block3_text_kz = isset($data['block3_text_kz']) ? $data['block3_text_kz'] : '';
            $carreer_kz->block4_title_kz = isset($data['block4_title_kz']) ? $data['block4_title_kz'] : '';
            $carreer_kz->block4_text_kz = isset($data['block4_text_kz']) ? $data['block4_text_kz'] : '';
            $carreer_kz->block5_title_kz = isset($data['block5_title_kz']) ? $data['block5_title_kz'] : '';
            $carreer_kz->block5_text_kz = isset($data['block5_text_kz']) ? $data['block5_text_kz'] : '';
            $carreer_kz->block6_title_kz = isset($data['block6_title_kz']) ? $data['block6_title_kz'] : '';
            $carreer_kz->block6_text_kz = isset($data['block6_text_kz']) ? $data['block6_text_kz'] : '';
            $carreer_kz->block7_title_kz = isset($data['block7_title_kz']) ? $data['block7_title_kz'] : '';
            $carreer_kz->block7_text_kz = isset($data['block7_text_kz']) ? $data['block7_text_kz'] : '';
            $carreer_kz->block8_title_kz = isset($data['block8_title_kz']) ? $data['block8_title_kz'] : '';
            $carreer_kz->block8_text_kz = isset($data['block8_text_kz']) ? $data['block8_text_kz'] : '';
            $carreer_kz->block9_title_kz = isset($data['block9_title_kz']) ? $data['block9_title_kz'] : '';
            $carreer_kz->block9_text_kz = isset($data['block9_text_kz']) ? $data['block9_text_kz'] : '';
            $carreer_kz->block10_title_kz = isset($data['block10_title_kz']) ? $data['block10_title_kz'] : '';
            $carreer_kz->block11_title_kz = isset($data['block11_title_kz']) ? $data['block11_title_kz'] : '';
            $carreer_kz->block11_text_kz = isset($data['block11_text_kz']) ? $data['block11_text_kz'] : '';
            $carreer_kz->card1_title_kz = isset($data['card1_title_kz']) ? $data['card1_title_kz'] : '';
            $carreer_kz->card1_text_kz = isset($data['card1_text_kz']) ? $data['card1_text_kz'] : '';
            $carreer_kz->card2_title_kz = isset($data['card2_title_kz']) ? $data['card2_title_kz'] : '';
            $carreer_kz->card2_text_kz = isset($data['card2_text_kz']) ? $data['card2_text_kz'] : '';
            $carreer_kz->card3_title_kz = isset($data['card3_title_kz']) ? $data['card3_title_kz'] : '';
            $carreer_kz->card3_text_kz = isset($data['card3_text_kz']) ? $data['card3_text_kz'] : '';
            $carreer_kz->card4_title_kz = isset($data['card4_title_kz']) ? $data['card4_title_kz'] : '';
            $carreer_kz->card4_text_kz = isset($data['card4_text_kz']) ? $data['card4_text_kz'] : '';
            $carreer_kz->save();

        if (isset($data['seo_title'])) {
            $seo = SEO::query()->where('page', 'production')->first();
            if (!$seo) {
                $seo = new SEO();
                $seo->page = 'production';
            }
            $seo->title = $data['seo_title'];
            $seo->description = $data['seo_description'];
            $seo->keywords = $data['seo_keywords'];
            $seo->save();
        }
        return $carreer->save();
    }

    public function delete(Carreer $carreer)
    {
        return $carreer->delete();
    }
}
