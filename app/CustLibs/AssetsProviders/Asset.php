<?php


namespace App\CustLibs\AssetsProviders;


use Illuminate\Support\Carbon;

class Asset implements AssetInter
{
    protected $id = null;
    protected $date_purchased = null;
    protected $name = null;
    protected $description = null;
    protected $image = null;

    public function __construct(string $id,
                                string $name,
                                string $description = null,
                                Carbon $date_purchased = null,
                                string $image = null){
        $this->set_id($id);
        $this->set_name($name);
        $this->set_date_purchased($date_purchased);
        $this->set_description($description);
        $this->set_image($image);
    }


    function set_id(?string $id): void
    {
        $this->id = $id;
    }

    function get_id(): ?string
    {
        return $this->id;
    }

    function set_date_purchased(?Carbon $date_purchased): void
    {
        $this->date_purchased = $date_purchased;
    }

    function get_date_purchased(): ?Carbon
    {
        return $this->date_purchased;
    }

    function set_name(?string $name): void
    {
        $this->name = $name;
    }

    function get_name(): ?string
    {
        return $this->name;
    }

    function set_description(?string $description): void
    {
        if (!is_null($description))
            $this->description = $description;
    }

    function get_description(): ?string
    {
        return $this->description;
    }

    function set_image(?string $image): void
    {
        $this->image = $image;
    }

    function get_image(): ?string
    {
        return $this->image;
    }

    function get_array(): array
    {
        return [
            "image"=>$this->get_image(),
            "description"=>$this->get_description(),
            "id" => $this->get_id(),
            "name" => $this->get_name(),
            "date_purchased" => $this->get_date_purchased()
        ];
    }

    function update(AssetInter $asset,bool $ignore_null = false)
    {
        if (!$ignore_null || !is_null($asset->get_id()) )
            $this->set_id($asset->get_id());
        if (!$ignore_null || !is_null($asset->get_image()) )
            $this->set_image($asset->get_image());
        if (!$ignore_null || !is_null($asset->get_name()) )
            $this->set_name($asset->get_name());
        if (!$ignore_null || !is_null($asset->get_description()) )
            $this->set_description($asset->get_description());
    }
}