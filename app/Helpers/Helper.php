<?php
namespace App\Helpers;

use App\Models\ProjectCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class Helper
{
    public static function getWorldMenu()
    {
        return Db::table('continents')->get();
    }

    public static function servicesOptions()
    {
        $data = '';
        $services = \App\Models\Service::where('status', 'active')->get();
        $products = \App\Models\Product::where('status', 'active')->get();
        foreach ($services as $service) {
            $data .= "<option>$service->title</option>";
        }
        foreach ($products as $product) {
            $data .= "<option>$product->title</option>";
        }
        return $data;
    }

    public static function getTopMenu()
    {
        $menu = DB::table('menu')->where('position', 'like', '%top%')->orderBy('display_order')->get();
        $html = '';
        foreach ($menu as $key => $value) {
            $html .= "<li><a href='pages/{{ $value->slug }}'>" . $value->name . '</a></li>';
        }
        echo $html;
    }

    public static function getMenuLinks($tag)
    {
        $menu = DB::table('menu')
            ->where('position', 'like', '%' . $tag . '%')
            ->orderBy('display_order')
            ->get();
        $html = '';
        $appendString = '&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp; ';
        if ($tag == 'bottom') {
            foreach ($menu as $key => $value) {
                if ($key == 1) {
                    $appendString = '';
                }
                $html .= "<a href='" . url($value->slug) . "'>" . $value->name . '</a>' . $appendString;
            }
        } else {
            foreach ($menu as $key => $value) {
                $html .= "<li><a  class='link' href='" . url($value->slug) . "'>" . $value->name . '</a></li>';
            }
        }

        echo $html;
    }

    public static function getServicesProducts($tag)
    {
        return DB::table('services')
            ->where('position', 'like', '%' . $tag . '%')
            ->orderBy('display_order')
            ->get();
    }

    public static function menuOptions($parent_id = 0, $id = 0)
    {
        $parentRecords = DB::table('menu')->where('parent', '0')->orderBy('display_order')->get();
        foreach ($parentRecords as $key => $element) {
            if ($element->id == $parent_id) {
                $selected = ' selected ';
            } else {
                $selected = '';
            }
            if ($id == $element->id) {
                continue;
            }
            echo '<option ' . $selected . " value='" . $element->id . "'>" . $element->name . '</option>';
            if (
                $array = DB::table('menu')
                ->where('parent', $element->id)
                ->orderBy('display_order')
                ->get()
            ) {
                foreach ($array as $key2 => $element2) {
                    if ($element2->id == $parent_id) {
                        $selected = ' selected ';
                    } else {
                        $selected = '';
                    }
                    if ($id == $element2->id) {
                        continue;
                    }
                    echo '<option ' . $selected . " value='" . $element2->id . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $element2->name . '</option>';
                    if (
                        $array = DB::table('menu')
                        ->where('parent', $element2->id)
                        ->orderBy('display_order')
                        ->get()
                    ) {
                        foreach ($array as $key3 => $element3) {
                            if ($element3->id == $parent_id) {
                                $selected = ' selected ';
                            } else {
                                $selected = '';
                            }
                            if ($id == $element3->id) {
                                continue;
                            }
                            echo '<option ' . $selected . " value='" . $element3->id . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $element3->name . '</option>';
                        }
                    }
                }
            }
        }
    }

    public static function getMenuRows($parent = 0)
    {
        return DB::table('menu')
            ->where([['display', 'Yes'], ['parent', $parent], ['position', 'like', '%navigation%']])
            ->orderBy('display_order', 'asc')
            ->get();
    }

    public static function CatsOptionsAll($parent_id = 0, $cat_id = 0)
    {
        $parentRecords = Helper::Cats(0);
        foreach ($parentRecords as $key => $element) {
            if ($element->cat_id == $parent_id) {
                $selected = ' selected ';
            } else {
                $selected = '';
            }
            if ($cat_id == $element->cat_id) {
                continue;
            }
            echo '<option ' . $selected . " value='" . $element->cat_id . "'>" . $element->cat_name . '</option>';
            if ($array = Helper::Cats($element->cat_id)) {
                foreach ($array as $key2 => $element2) {
                    if ($element2->cat_id == $parent_id) {
                        $selected = ' selected ';
                    } else {
                        $selected = '';
                    }
                    if ($cat_id == $element2->cat_id) {
                        continue;
                    }
                    echo '<option ' . $selected . " value='" . $element2->cat_id . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $element2->cat_name . '</option>';
                    if ($array = Helper::Cats($element2->cat_id)) {
                        foreach ($array as $key3 => $element3) {
                            if ($element3->cat_id == $parent_id) {
                                $selected = ' selected ';
                            } else {
                                $selected = '';
                            }
                            if ($cat_id == $element3->cat_id) {
                                continue;
                            }
                            echo '<option ' . $selected . " value='" . $element3->cat_id . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $element3->cat_name . '</option>';
                            if ($array = Helper::Cats($element3->cat_id)) {
                                foreach ($array as $key4 => $element4) {
                                    if ($element4->cat_id == $parent_id) {
                                        $selected = ' selected ';
                                    } else {
                                        $selected = '';
                                    }
                                    if ($cat_id == $element4->cat_id) {
                                        continue;
                                    }
                                    echo '<option ' . $selected . " value='" . $element4->cat_id . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $element4->cat_name . '</option>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public static function showAlert($string = 'No Text Given', $type = 'primary')
    {
        return '<div class="alert alert-' .
            $type .
            ' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' .
            $string .
            '</div>';
    }

    public static function getOptions($config = [])
    {
        extract($config);
        if (!array_key_exists('table', $config)) {
            echo "<option value='' disabled selected>Table missing</option>";
            return;
        }
        if (!array_key_exists('cond', $config)) {
            $cond = [];
        }
        if (!array_key_exists('value', $config)) {
            $value = 'id';
        }
        if (!array_key_exists('key', $config)) {
            $key = $value;
        }

        // Ensure $select is an array
        if (!array_key_exists('select', $config)) {
            $select = [];
        } elseif (!is_array($select)) {
            $select = [$select];
        }

        if (!array_key_exists('selectOption', $config)) {
            $selectOption = false;
        }

        if ($cond) {
            $data = DB::table($table)->where($cond)->get();
        } else {
            $data = DB::table($table)->get();
        }

        if ($data) {
            if ($selectOption) {
                echo "<option value='' disabled selected>Select option</option>";
            }
            foreach ($data as $row2) {
                $selected = in_array($row2->$key, $select) ? 'selected' : '';
                echo "<option value='" . $row2->$key . "' " . $selected . '>' . $row2->$value . '</option>';
            }
        } else {
            echo "<option value='' disabled selected>No Options</option>";
        }
    }

    public static function getRoles($config = [])
    {
        // Set the table to 'roles' by default
        $config['table'] = 'roles';

        // Define default values for other options
        $cond = $config['cond'] ?? [];
        $value = $config['value'] ?? 'id';
        $key = $config['key'] ?? $value;
        $select = $config['select'] ?? [];
        $select = is_array($select) ? $select : [$select];
        $selectOption = $config['selectOption'] ?? false;

        // Add condition to exclude "Super Admin" role
        $data = DB::table($config['table'])
            ->where($cond)
            ->where('name', '!=', 'Super Admin')
            ->get();

        // Start building the options output
        $options = '';
        if ($data->isNotEmpty()) {
            if ($selectOption) {
                $options .= "<option value='' disabled selected>Select option</option>";
            }
            foreach ($data as $row2) {
                $selected = in_array($row2->$key, $select) ? 'selected' : '';
                $options .= "<option value='" . $row2->$key . "' " . $selected . '>' . $row2->$value . '</option>';
            }
        } else {
            $options .= "<option value='' disabled selected>No Options</option>";
        }

        // Return the options string
        return $options;
    }

    //older not checked

    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function processImage($originalImage, $path = 'public/images', $thumb_check = true)
    {
        $image_name = time() . '_' . uniqid() . $originalImage->getClientOriginalExtension();
        $rawImage = Image::make($originalImage);
        $rawImage->save(storage_path($path . '/' . $image_name));

        if ($thumb_check) {
            // $rawImage->resize(150,150);
            $rawImage->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $rawImage->save(storage_path($path . '/thumb/' . $image_name));
        }
        return $image_name;
    }

    public static function unlinkImage($path, $image)
    {
        if ($image == '') {
            return true;
        }
        $full_path = $path . '/' . $image;
        $thumb_path = $path . '/' . 'thumb' . '/' . $image;
        if (File::exists($full_path)) {
            unlink($full_path);
        }
        if (File::exists($thumb_path)) {
            unlink($thumb_path);
        }
    }

    public static function getMenuOptions($select = '')
    {
        $data = Db::table('menus')->where('parent_id', 0)->select('menu_id', 'name')->get();
        if ($data) {
            foreach ($data as $row) {
                if ($row->menu_id == $select) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                echo "<option value='" . $row->menu_id . "' " . $selected . '>' . $row->name . '</option>';
                $data2 = Db::table('menus')
                    ->where('parent_id', $row->menu_id)
                    ->select('menu_id', 'name')
                    ->get();
                foreach ($data2 as $row2) {
                    if ($row2->menu_id == $select) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    echo "<option value='" . $row2->menu_id . "' " . $selected . '>  &nbsp;&nbsp;--&nbsp;' . $row2->name . '</option>';
                }
            }
        }
    }

    public static function getField($table, $cond, $field)
    {
        return $data = Db::table($table)->where($cond)->select($field)->pluck($field)->first();
    }

    public static function countRows($tableName, $cond = [])
    {
        if ($cond) {
            return Db::table($tableName)->where($cond)->count();
        } else {
            return Db::table($tableName)->count();
        }
    }

    public static function cleanSlug($string)
    {
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public static function getServices()
    {
        return Service::where('status', 'active')->orderBy('display_order', 'asc')->get();
    }

    public static function settings()
    {
        return DB::table('settings')->find(1);
    }

    public static function projectcategories($id)
    {
        return ProjectCategory::where('id', $id)->value('title');
    }

    public static function projectcategory()
    {
        return ProjectCategory::get();
    }

    public static function handleImageUpload($image, $oldImage = null)
    {
        $extension = $image->getClientOriginalExtension();

        if ($extension == 'svg') {
            $tempName = $image->store('images', 'public');
            $fileName = str_replace('images/', '', $tempName);

            if ($oldImage) {
                Storage::disk('public')->delete('images/' . $oldImage);
                Storage::disk('public')->delete('thumb/' . $oldImage);
            }

            return $fileName;
        }

        $tempName = $image->store('images', 'public');
        $fileName = str_replace('images/', '', $tempName);

        $imagePath = public_path('storage/images/' . $fileName);
        $thumbPath = config('constants.store_thumb_path') . $fileName;

        Image::make($imagePath)->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($thumbPath);

        if ($oldImage) {
            Storage::disk('public')->delete('images/' . $oldImage);
            Storage::disk('public')->delete('thumb/' . $oldImage);
        }

        return $fileName;
    }

    public static function setDate($date)
    {

        if (is_null($date)) {
            return;
        }

        return Carbon::parse($date)->format('d M Y');

    }

    public static function services()
    {
        $services = \App\Models\Service::where('status', 'active')->get();

        return $services;

    }

    public static function portfilioservices($data)
    {
        $ids = json_decode($data);

        $services = \App\Models\Project::whereIn('id', $ids)->get();

        return $services;

    }

    public static function getTechnologiesOptions()
    {
        return [
            'ui_ux_design' => [
                ['value' => 'figma', 'text' => 'Figma'],
                ['value' => 'adobe', 'text' => 'Adobe XD'],
                ['value' => 'adobe_illustrator', 'text' => 'Adobe Illustrator'],
                ['value' => 'invision', 'text' => 'InVision'],
                ['value' => 'photoshop', 'text' => 'Photoshop'],
            ],
            'web_development' => [
                ['value' => 'javascript', 'text' => 'JavaScript'],
                ['value' => 'java', 'text' => 'Java'],
                ['value' => 'vuejs', 'text' => 'Vue.js'],
                ['value' => 'reactjs', 'text' => 'React.js'],
                ['value' => 'nodejs', 'text' => 'Node.js'],
                ['value' => 'mongodb', 'text' => 'MongoDB'],
                ['value' => 'mysql', 'text' => 'MySQL'],
                ['value' => 'firebase', 'text' => 'Firebase'],
                ['value' => 'postgress', 'text' => 'PostgreSQL'],
                ['value' => 'aws', 'text' => 'AWS'],
            ],
            'mobile_development' => [
                ['value' => 'flutter', 'text' => 'Flutter'],
                ['value' => 'react_native', 'text' => 'React Native'],
                ['value' => 'kotlin', 'text' => 'Kotlin'],
                ['value' => 'swift', 'text' => 'Swift'],
            ],
            'software_project_management' => [
                ['value' => 'click_up', 'text' => 'Click Up'],
                ['value' => 'jira', 'text' => 'Jira'],
                ['value' => 'monday_com', 'text' => 'Monday.com'],
                ['value' => 'assana', 'text' => 'Asana'],
                ['value' => 'trello', 'text' => 'Trello'],
                ['value' => 'notion', 'text' => 'Notion'],
                ['value' => 'ms_project', 'text' => 'MS Project'],
                ['value' => 'zapier', 'text' => 'Zapier'],
                ['value' => 'zoho', 'text' => 'Zoho'],
                ['value' => 'smart_sheet', 'text' => 'Smart Sheet'],
            ],
            'software_business_analysis' => [
                ['value' => 'ms_word', 'text' => 'MS Word'],
                ['value' => 'ms_excel', 'text' => 'MS Excel'],
                ['value' => 'confluence', 'text' => 'Confluence'],
                ['value' => 'figma', 'text' => 'Figma'],
                ['value' => 'pencil_tool', 'text' => 'Pencil Tool'],
                ['value' => 'mockitt', 'text' => 'Mockitt'],
                ['value' => 'balsamiq', 'text' => 'Balsamiq'],
                ['value' => 'draw_io', 'text' => 'Draw.io'],
            ],
            'software_quality_assurance' => [
                ['value' => 'selenium', 'text' => 'Selenium'],
                ['value' => 'cypress', 'text' => 'Cypress'],
                ['value' => 'postman', 'text' => 'Postman'],
                ['value' => 'jmeter', 'text' => 'JMeter'],
                ['value' => 'ms_excel', 'text' => 'MS Excel'],
                ['value' => 'ms_word', 'text' => 'MS Word'],
                ['value' => 'confluence', 'text' => 'Confluence'],
            ],
        ];
    }

    public static function getFilteredOptions($services)
    {
        $allOptions = self::getTechnologiesOptions();
        $filteredOptions = [];

        foreach ($services as $service) {
            if (isset($allOptions[$service])) {
                $filteredOptions[$service] = $allOptions[$service];
            }
        }

        return $filteredOptions;
    }
}
