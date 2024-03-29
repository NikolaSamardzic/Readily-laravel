<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'href',
        'appearance_order',
        'link_target_id',
        'link_type_id',
    ];

    public static function headerLinksForUserRole(int $roleId){
        return self::select('links.name', 'links.href')
            ->join('link_link_position', 'links.id', '=', 'link_link_position.link_id')
                ->join('link_positions', 'link_positions.id', '=', 'link_link_position.link_position_id')
            ->join('link_role', 'links.id', '=', 'link_role.link_id')
            ->join('roles', 'roles.id', '=', 'link_role.role_id')
            ->where('link_positions.name', 'header')
            ->where('roles.id', $roleId)
            ->orderBy('links.appearance_order', 'ASC')
            ->get();
    }

    public static function footerLinksForUserRole(int $roleId){
        $links = self::select('links.name', 'links.href','link_targets.name AS target', 'link_types.name AS type', 'links.appearance_order')
            ->join('link_link_position', 'links.id', '=', 'link_link_position.link_id')
            ->join('link_positions', 'link_positions.id', '=', 'link_link_position.link_position_id')
            ->join('link_role', 'links.id', '=', 'link_role.link_id')
            ->join('roles', 'roles.id', '=', 'link_role.role_id')
            ->join('link_targets', 'links.link_target_id', '=', 'link_targets.id')
            ->join('link_types','links.link_type_id','=','link_types.id')
            ->where('link_positions.name', 'footer')
            ->where('roles.id', $roleId)
            ->orderBy('links.appearance_order', 'ASC')
            ->get();
        ;

        $footerLinks = [];
        $pageLinks = [];
        $socialMediaLinks = [];
        $documentsLinks = [];
        foreach ($links as $link){
            $currentLink = [
                'name' => $link['name'],
                'href' => $link['href'],
                'target' => $link['target'],
                'type' => $link['type'],
                'appearance_order' => $link['appearance_order'],
            ];

            switch ($link['type']){
                case 'document' :
                    $documentsLinks[] = $currentLink;
                    break;
                case 'link' :
                    $pageLinks[] = $currentLink;
                    break;
                case 'social media' :
                    $socialMediaLinks[] = $currentLink;
                    break;
            }
        }

        $footerLinks['documentLinks'] = $documentsLinks;
        $footerLinks['pageLinks'] = $pageLinks;
        $footerLinks['socialMediaLinks'] = $socialMediaLinks;

        return $footerLinks;
    }

    public function linkTarget() : BelongsTo
    {
        return $this->belongsTo(LinkTarget::class);
    }

    public function linkType() : BelongsTo
    {
        return $this->belongsTo(LinkType::class);
    }

    public function linkPositions() : BelongsToMany
    {
        return $this->belongsToMany(LinkPosition::class);
    }

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
