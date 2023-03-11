<?php

namespace App\Models\Products;

use Exception;
class WomensTrouser extends AbstractTrouser
{
    private ?int $size;

    public function __construct()
    {
        parent::__construct();

        $this->size = null;

        try {
            $this->setGender('Womens');
        }
        catch (Exception $e){
            print 'Error: WomensTrouser Constructor failed - ' . $e->getMessage() . PHP_EOL;
        }

    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @throws Exception
     */
    public function setSize($size): void
    {
        if ($size < 4 || $size > 26) {
            throw new Exception('Invalid size - women\'s trouser size must be in the range of 4 to 26');
        }
        else {
            $this->size = $size;
        }
    }

    public function getTable(): string
    {
        return 'womens_trousers';
    }
}