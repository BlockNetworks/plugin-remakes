<?php
namespace RecipePro;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;

class Main extends PluginBase implements CommandExecutor
{

    protected $recipes;

    public function onEnable()
    {
        if (!is_dir($this->getDataFolder())) {
            @mkdir($this->getDataFolder());
        }
        $items = [
            [
                "name" => "air",
                "id" => "0",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "stone",
                "id" => "1",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "grass_block",
                "id" => "2",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "dirt",
                "id" => "3",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "cobblestone",
                "id" => "4",
                "description" => "Mine stone"
            ],

            [
                "name" => "wooden_planks",
                "id" => "5",
                "description" => "1 wood"
            ],

            [
                "name" => "sapling",
                "id" => "6",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "bedrock",
                "id" => "7",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "water",
                "id" => "8",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "stationary_water",
                "id" => "9",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "lava",
                "id" => "10",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "stationary_lava",
                "id" => "11",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "sand",
                "id" => "12",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "gravel",
                "id" => "13",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "gold_ore",
                "id" => "14",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_ore",
                "id" => "15",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "coal_ore",
                "id" => "16",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "wood",
                "id" => "17",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "leaves",
                "id" => "18",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "glass",
                "id" => "20",
                "description" => "Smelt sand"
            ],

            [
                "name" => "lapis_lazuli_ore",
                "id" => "21",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "lapis_lazuli_block",
                "id" => "22",
                "description" => "9 lapis lazuli"
            ],

            [
                "name" => "sandstone",
                "id" => "24",
                "description" => "4 sand"
            ],

            [
                "name" => "bed",
                "id" => "26",
                "description" => "3 wool, 3 wooden planks"
            ],

            [
                "name" => "cobweb",
                "id" => "30",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "tall_grass",
                "id" => "31",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "dead_bush",
                "id" => "32",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "wool",
                "id" => "35",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "yellow_flower",
                "id" => "37",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "cyan_flower",
                "id" => "38",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "brown_mushroom",
                "id" => "39",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "red_mushroom",
                "id" => "40",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "gold_block",
                "id" => "41",
                "description" => "9 gold ingots"
            ],

            [
                "name" => "iron_block",
                "id" => "42",
                "description" => "9 iron ingots"
            ],

            [
                "name" => "double_stone_slab",
                "id" => "43",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "stone_slab",
                "id" => "44",
                "description" => "3 stone"
            ],

            [
                "name" => "brick_block",
                "id" => "45",
                "description" => "4 bricks"
            ],

            [
                "name" => "tnt",
                "id" => "46",
                "description" => "4 sand, 5 gunpowder"
            ],

            [
                "name" => "bookshelf",
                "id" => "47",
                "description" => "6 wooden planks, 3 books"
            ],

            [
                "name" => "moss_stone",
                "id" => "48",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "obsidian",
                "id" => "49",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "torch",
                "id" => "50",
                "description" => "1 coal, 1 stick"
            ],

            [
                "name" => "fire",
                "id" => "51",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "wooden_stairs",
                "id" => "53",
                "description" => "6 wooden planks"
            ],

            [
                "name" => "chest",
                "id" => "54",
                "description" => "8 wooden planks"
            ],

            [
                "name" => "diamond_ore",
                "id" => "56",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "diamond_block",
                "id" => "57",
                "description" => "9 diamonds"
            ],

            [
                "name" => "crafting_table",
                "id" => "58",
                "description" => "4 wooden planks"
            ],

            [
                "name" => "seeds",
                "id" => "59",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "farmland",
                "id" => "60",
                "description" => "Use a hoe on dirt"
            ],

            [
                "name" => "furnace",
                "id" => "61",
                "description" => "8 cobblestone"
            ],

            [
                "name" => "burning_furnace",
                "id" => "62",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "sign_post",
                "id" => "63",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "wooden_door",
                "id" => "64",
                "description" => "6 wooden planks"
            ],

            [
                "name" => "ladder",
                "id" => "65",
                "description" => "7 sticks"
            ],

            [
                "name" => "cobblestone_stairs",
                "id" => "67",
                "description" => "6 cobblestone"
            ],

            [
                "name" => "wall_sign",
                "id" => "68",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_door",
                "id" => "71",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "redstone_ore",
                "id" => "73",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "glowing_redstone_ore",
                "id" => "74",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "ice",
                "id" => "79",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "snow",
                "id" => "80",
                "description" => "4 snowballs"
            ],

            [
                "name" => "cactus",
                "id" => "81",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "clay",
                "id" => "82",
                "description" => "Smelt clay"
            ],

            [
                "name" => "sugar_cane",
                "id" => "83",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "fence",
                "id" => "85",
                "description" => "6 sticks"
            ],

            [
                "name" => "netherrack",
                "id" => "87",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "glowstone",
                "id" => "89",
                "description" => "4 glowstone dust"
            ],

            [
                "name" => "cake_block",
                "id" => "92",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "invisible_bedrock",
                "id" => "95",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "stone_brick",
                "id" => "98",
                "description" => "4 stone"
            ],

            [
                "name" => "glass_pane",
                "id" => "102",
                "description" => "6 glass"
            ],

            [
                "name" => "melon",
                "id" => "103",
                "description" => "9 melon slices"
            ],

            [
                "name" => "melon_stem",
                "id" => "105",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "fence_gate",
                "id" => "107",
                "description" => "2 wooden planks, 4 sticks"
            ],

            [
                "name" => "stone_brick_stairs",
                "id" => "109",
                "description" => "6 stone bricks"
            ],

            [
                "name" => "brick_stairs",
                "id" => "108",
                "description" => "6 brick blocks"
            ],

            [
                "name" => "nether_brick",
                "id" => "112",
                "description" => "4 nether bricks"
            ],

            [
                "name" => "nether_brick_stairs",
                "id" => "114",
                "description" => "6 nether brick blocks"
            ],

            [
                "name" => "sandstone_stairs",
                "id" => "128",
                "description" => "6 sandstone"
            ],

            [
                "name" => "block_of_quartz",
                "id" => "155",
                "description" => "4 nether quartz"
            ],

            [
                "name" => "quartz_stairs",
                "id" => "156",
                "description" => "6 quartz blocks"
            ],

            [
                "name" => "stone_cutter",
                "id" => "245",
                "description" => "4 cobblestone"
            ],

            [
                "name" => "glowing_obsidian",
                "id" => "246",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "nether_reactor_core",
                "id" => "247",
                "description" => "3 diamonds, 6 iron ingots"
            ],

            [
                "name" => "update_game_block",
                "id" => "248",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "update_game_block_two",
                "id" => "249",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "grass_block_glitched",
                "id" => "253",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "leaves",
                "id" => "254",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => ".name",
                "id" => "255",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_shovel",
                "id" => "256",
                "description" => "1 iron ingot, 2 sticks"
            ],

            [
                "name" => "iron_pickaxe",
                "id" => "257",
                "description" => "3 iron ingots, 2 sticks"
            ],

            [
                "name" => "iron_axe",
                "id" => "258",
                "description" => "3 iron ingots, 2 sticks"
            ],

            [
                "name" => "flint_and_steel",
                "id" => "259",
                "description" => "1 flint, 1 iron ingot"
            ],

            [
                "name" => "apple",
                "id" => "260",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "bow",
                "id" => "261",
                "description" => "3 strings, 3 sticks"
            ],

            [
                "name" => "arrow",
                "id" => "262",
                "description" => "1 stick, 1 feather, 1 flint"
            ],

            [
                "name" => "coal",
                "id" => "263",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "diamond",
                "id" => "264",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_ingot",
                "id" => "265",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "gold_ingot",
                "id" => "266",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_sword",
                "id" => "267",
                "description" => "2 iron ingots, 1 stick"
            ],

            [
                "name" => "wooden_sword",
                "id" => "268",
                "description" => "2 wooden planks, 1 stick"
            ],

            [
                "name" => "wooden_shovel",
                "id" => "269",
                "description" => "1 wooden plank, 2 sticks"
            ],

            [
                "name" => "wooden_pickaxe",
                "id" => "270",
                "description" => "3 wooden planks, 2 sticks"
            ],

            [
                "name" => "wooden_axe",
                "id" => "271",
                "description" => "3 wooden planks, 2 sticks"
            ],

            [
                "name" => "stone_sword",
                "id" => "272",
                "description" => "2 cobblestone, 1 stick"
            ],

            [
                "name" => "stone_shovel",
                "id" => "273",
                "description" => "1 cobblestone, 2 sticks"
            ],

            [
                "name" => "stone_pickaxe",
                "id" => "274",
                "description" => "3 cobblestone, 2 sticks"
            ],

            [
                "name" => "stone_axe",
                "id" => "275",
                "description" => "3 cobblestone, 2 sticks"
            ],

            [
                "name" => "diamond_sword",
                "id" => "276",
                "description" => "2 diamonds, 1 stick"
            ],

            [
                "name" => "diamond_shovel",
                "id" => "277",
                "description" => "1 diamond, 2 sticks"
            ],

            [
                "name" => "diamond_pickaxe",
                "id" => "278",
                "description" => "3 diamonds, 2 sticks"
            ],

            [
                "name" => "diamond_axe",
                "id" => "279",
                "description" => "3 diamonds, 2 sticks"
            ],

            [
                "name" => "stick",
                "id" => "280",
                "description" => "2 wooden planks"
            ],

            [
                "name" => "bowl",
                "id" => "281",
                "description" => "3 wooden planks"
            ],

            [
                "name" => "gold_sword",
                "id" => "283",
                "description" => "2 gold ingots, 1 stick"
            ],

            [
                "name" => "gold_shovel",
                "id" => "284",
                "description" => "1 gold ingot, 2 sticks"
            ],

            [
                "name" => "gold_pickaxe",
                "id" => "285",
                "description" => "3 gold ingots, 2 sticks"
            ],

            [
                "name" => "gold_axe",
                "id" => "286",
                "description" => "3 gold ingots, 2 sticks"
            ],

            [
                "name" => "string",
                "id" => "287",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "feather",
                "id" => "288",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "gunpowder",
                "id" => "289",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "leather_cap",
                "id" => "298",
                "description" => "5 leather"
            ],

            [
                "name" => "leather_tunic",
                "id" => "299",
                "description" => "8 leather"
            ],

            [
                "name" => "leather_pants",
                "id" => "300",
                "description" => "7 leather"
            ],

            [
                "name" => "leather_boots",
                "id" => "301",
                "description" => "4 leather"
            ],

            [
                "name" => "chain_helmet",
                "id" => "302",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "chain_chestplate",
                "id" => "303",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "chain_leggings",
                "id" => "304",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "chain_boots",
                "id" => "305",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_helmet",
                "id" => "306",
                "description" => "5 iron ingots"
            ],

            [
                "name" => "iron_chestplate",
                "id" => "307",
                "description" => "8 iron ingots"
            ],

            [
                "name" => "iron_leggings",
                "id" => "308",
                "description" => "7 iron ingots"
            ],

            [
                "name" => "iron_boots",
                "id" => "309",
                "description" => "4 iron ingots"
            ],

            [
                "name" => "diamond_helmet",
                "id" => "310",
                "description" => "5 diamonds"
            ],

            [
                "name" => "diamond_chestplate",
                "id" => "311",
                "description" => "8 diamonds"
            ],

            [
                "name" => "diamond_leggings",
                "id" => "312",
                "description" => "7 diamonds"
            ],

            [
                "name" => "diamond_boots",
                "id" => "313",
                "description" => "4 diamonds"
            ],

            [
                "name" => "golden_helmet",
                "id" => "314",
                "description" => "5 gold ingots"
            ],

            [
                "name" => "golden_chestplate",
                "id" => "315",
                "description" => "8 gold ingots"
            ],

            [
                "name" => "golden_leggings",
                "id" => "316",
                "description" => "7 gold ingots"
            ],

            [
                "name" => "golden_boots",
                "id" => "317",
                "description" => "4 gold ingots"
            ],

            [
                "name" => "flint",
                "id" => "292",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "wheat",
                "id" => "296",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "painting",
                "id" => "321",
                "description" => "1 wool, 8 sticks"
            ],

            [
                "name" => "sign",
                "id" => "323",
                "description" => "6 wooden planks, 1 stick"
            ],

            [
                "name" => "wooden_door",
                "id" => "324",
                "description" => "6 wooden planks"
            ],

            [
                "name" => "bucket",
                "id" => "325",
                "description" => "3 iron ingots"
            ],

            [
                "name" => "saddle",
                "id" => "329",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "iron_door",
                "id" => "330",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "snowball",
                "id" => "332",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "leather",
                "id" => "334",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "clay_brick",
                "id" => "336",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "clay",
                "id" => "337",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "sugar_cane",
                "id" => "338",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "paper",
                "id" => "339",
                "description" => "3 sugar cane"
            ],

            [
                "name" => "book",
                "id" => "340",
                "description" => "3 paper"
            ],

            [
                "name" => "slimeball",
                "id" => "341",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "egg",
                "id" => "344",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "compass",
                "id" => "345",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "clock",
                "id" => "347",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "glowstone_dust",
                "id" => "348",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "dye",
                "id" => "351",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "bone",
                "id" => "352",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "sugar",
                "id" => "353",
                "description" => "1 sugar cane"
            ],

            [
                "name" => "shears",
                "id" => "359",
                "description" => "2 iron ingots"
            ],

            [
                "name" => "spawn_egg",
                "id" => "383",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "nether_brick",
                "id" => "405",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "nether_quartz",
                "id" => "406",
                "description" => "Cannot be crafted"
            ],

            [
                "name" => "camera",
                "id" => "456",
                "description" => "Cannot be crafted"
            ]
        ];
        $this->recipes = (new Config($this->getDataFolder()."recipes.yml",
                                              Config::YAML,$items))->getAll();
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        switch ($cmd->getName()) {
            case "recipe":
                if (count($args) != 1) {
                    return false;
                }
                foreach ($this->recipes as $val) {
                    if ($val["name"] == strtolower($args[0]) ||
                         $val["id"] == $args[0]) {
                        $sender->sendMessage("[RecipePro] ".$val["name"].
                                                    ": <Item ID>:".$val["id"]);
                        $sender->sendMessage("[RecipePro] ".$val["description"]);
                    }
                }
                return true;
        }
        return false;
    }

}
