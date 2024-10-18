<?php

namespace App\Services\Admin;

use App\Models\FinancePage;
use App\Services\FileService;
use App\Services\TranslateService;

class FinancePageService
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
         //title, image, text,
            //card1 - card4 - title, text
            //card5 - card9 - title, text, subtitle
            //block2_image
        return FinancePage::query()->create([
           'title' => $data['title'],
           'image' => $this->fileService->saveFile($data['image'], FinancePage::IMAGE_PATH),
            'text' => $data['text'],
            'card1_title' => $data['card1_title'],
            'card1_text' => $data['card1_text'],
            'card2_title' => $data['card2_title'],
            'card2_text' => $data['card2_text'],
            'card3_title' => $data['card3_title'],
            'card3_text' => $data['card3_text'],
            'card4_title' => $data['card4_title'],
            'card4_text' => $data['card4_text'],
            'card5_title' => $data['card5_title'],
            'card5_text' => $data['card5_text'],
            'card5_subtitle' => $data['card5_subtitle'],
            'card6_title' => $data['card6_title'],
            'card6_text' => $data['card6_text'],
            'card6_subtitle' => $data['card6_subtitle'],
            'card7_title' => $data['card7_title'],
            'card7_text' => $data['card7_text'],
            'card7_subtitle' => $data['card7_subtitle'],
            'card8_title' => $data['card8_title'],
            'card8_text' => $data['card8_text'],
            'card8_subtitle' => $data['card8_subtitle'],
            'card9_title' => $data['card9_title'],
            'card9_text' => $data['card9_text'],
            'card9_subtitle' => $data['card9_subtitle'],
            'block2_image' => $this->fileService->saveFile($data['block2_image'], FinancePage::IMAGE_PATH),
        ]);
    }

    public function update(FinancePage $financePage, array $data)
    {
        $financePage->title = $data['title'];
        $financePage->text = $data['text'];
        $financePage->card1_title = $data['card1_title'];
        $financePage->card1_text = $data['card1_text'];
        $financePage->card2_title = $data['card2_title'];
        $financePage->card2_text = $data['card2_text'];
        $financePage->card3_title = $data['card3_title'];
        $financePage->card3_text = $data['card3_text'];
        $financePage->card4_title = $data['card4_title'];
        $financePage->card4_text = $data['card4_text'];
        $financePage->card5_title = $data['card5_title'];
        $financePage->card5_text = $data['card5_text'];
        $financePage->card5_subtitle = $data['card5_subtitle'];
        $financePage->card6_title = $data['card6_title'];
        $financePage->card6_text = $data['card6_text'];
        $financePage->card6_subtitle = $data['card6_subtitle'];
        $financePage->card7_title = $data['card7_title'];
        $financePage->card7_text = $data['card7_text'];
        $financePage->card7_subtitle = $data['card7_subtitle'];
        $financePage->card8_title = $data['card8_title'];
        $financePage->card8_text = $data['card8_text'];
        $financePage->card8_subtitle = $data['card8_subtitle'];
        $financePage->card9_title = $data['card9_title'];
        $financePage->card9_text = $data['card9_text'];
        $financePage->card9_subtitle = $data['card9_subtitle'];

        // Add kz fields
        $financePage->title_kz = $data['title_kz'];
        $financePage->text_kz = $data['text_kz'];
        $financePage->card1_title_kz = $data['card1_title_kz'];
        $financePage->card1_text_kz = $data['card1_text_kz'];
        $financePage->card2_title_kz = $data['card2_title_kz'];
        $financePage->card2_text_kz = $data['card2_text_kz'];
        $financePage->card3_title_kz = $data['card3_title_kz'];
        $financePage->card3_text_kz = $data['card3_text_kz'];
        $financePage->card4_title_kz = $data['card4_title_kz'];
        $financePage->card4_text_kz = $data['card4_text_kz'];
        $financePage->card5_title_kz = $data['card5_title_kz'];
        $financePage->card5_text_kz = $data['card5_text_kz'];
        $financePage->card5_subtitle_kz = $data['card5_subtitle_kz'];
        $financePage->card6_title_kz = $data['card6_title_kz'];
        $financePage->card6_text_kz = $data['card6_text_kz'];
        $financePage->card6_subtitle_kz = $data['card6_subtitle_kz'];
        $financePage->card7_title_kz = $data['card7_title_kz'];
        $financePage->card7_text_kz = $data['card7_text_kz'];
        $financePage->card7_subtitle_kz = $data['card7_subtitle_kz'];
        $financePage->card8_title_kz = $data['card8_title_kz'];
        $financePage->card8_text_kz = $data['card8_text_kz'];
        $financePage->card8_subtitle_kz = $data['card8_subtitle_kz'];
        $financePage->card9_title_kz = $data['card9_title_kz'];
        $financePage->card9_text_kz = $data['card9_text_kz'];
        $financePage->card9_subtitle_kz = $data['card9_subtitle_kz'];
        if (isset($data['image'])) {
            $financePage->image = $this->fileService->saveFile($data['image'], FinancePage::IMAGE_PATH, $financePage->image);
        }
        if (isset($data['block2_image'])) {
            $financePage->block2_image = $this->fileService->saveFile($data['block2_image'], FinancePage::IMAGE_PATH, $financePage->block2_image);
        }

        $miniCard5 = json_encode($data['mini_card_5']);
        $miniCard6 = json_encode($data['mini_card_6']);
        $miniCard7 = json_encode($data['mini_card_7']);
        $miniCard8 = json_encode($data['mini_card_8']);
        $miniCard9 = json_encode($data['mini_card_9']);
        $financePage->mini_card_5 = $miniCard5;
        $financePage->mini_card_6 = $miniCard6;
        $financePage->mini_card_7 = $miniCard7;
        $financePage->mini_card_8 = $miniCard8;
        $financePage->mini_card_9 = $miniCard9;
        if (isset($data['form_image'])){
            $financePage->form_image = $this->fileService->saveFile($data['form_image'], FinancePage::IMAGE_PATH, $financePage->form_image);
        }

        return $financePage->save();
    }

    public function delete(FinancePage $financePage)
    {
        return $financePage->delete();
    }
}
