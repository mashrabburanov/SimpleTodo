<?php

    class ItemsList {
        protected $stmnt;
        
        public function __construct(array $stmnt) {
            $this->stmnt = $stmnt;
        }

        public function print_list(): void {
            foreach(array_reverse($this->stmnt) as $row) {
                if ($row['done'] == true) {
                    self::print_item("ItemDone", $row['id'], $row['content'], $row['done']);
                } else {
                    self::print_item("ItemNotDone", $row['id'], $row['content'], $row['done']);
                }
            }
        }

        public function print_item(
            string $cssClass, 
            int $itemN, 
            string $content,
            bool $checked
            ): void 
        {
            $checked = $checked ? "checked" : "";

            echo <<<EOF
                <li class="$cssClass" id="$itemN">
                    <input type="checkbox" $checked></input>
                    <label>$content</label>
                    <button><img src="./view/resourses/trash_bin.avif" width="25" height="25"/></button>
                </li>
            EOF;
        }
    }