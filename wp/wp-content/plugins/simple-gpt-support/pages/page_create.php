<?php

if (!defined('ABSPATH')) exit;

/**
 * 一般設定ページ
 */
function page_sgs_create()
{
?>
  <div class="wrap">
    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <div class="sgs-chat">
        <div class="site-wrapper">
          <header>
            <div class="inner">
              <h1>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 540 344" aria-hidden="true">
                  <g>
                    <path id="Path_22347-4" data-name="Path 22347" d="M97.97,115.56l21.2,13.58a.4.4,0,0,1,.18.34l.17,77.12a.4.4,0,0,1-.62.34L17.55,140.85a.4.4,0,0,1-.18-.32L14.99,86.21a.4.4,0,0,1,.15-.34L123.56,1.44a.4.4,0,0,1,.46-.02l57.33,37.24a.4.4,0,0,1,0,.68L119.68,79.25a.4.4,0,0,0-.18.34l-.05,18.15a.4.4,0,0,1-.15.31L97.94,114.91a.4.4,0,0,0,.03.65Z" fill="#fff" />
                    <path id="Path_22348-4" data-name="Path 22348" d="M305.96,206.51l-53.25,1.99a.52.52,0,0,1-.54-.5l-1.97-58.22a.52.52,0,0,1,.5-.54l123.01-4.47a.52.52,0,0,1,.54.52V269.42a.52.52,0,0,1-.24.43L262.44,341.82a.52.52,0,0,1-.54.01L129.72,265.95a.52.52,0,0,1-.26-.45l-.04-180.49a.52.52,0,0,1,.24-.43L258.31,1.43a.52.52,0,0,1,.55-.01L371.93,68.6a.52.52,0,0,1,.05.86l-55.07,43.06a.52.52,0,0,1-.58.05L260.87,80.66a.52.52,0,0,0-.55.01l-59.83,38.86a.52.52,0,0,0-.24.43V227.73a.52.52,0,0,0,.26.45l59.39,34.43a.52.52,0,0,0,.55-.01l45.81-29.64a.52.52,0,0,0,.24-.43v-25.5a.52.52,0,0,0-.54-.52Z" fill="#fff" />
                    <path id="Path_22349-4" data-name="Path 22349" d="M528.59,200.22l2.77,54.35a.38.38,0,0,1-.14.31L423.98,341.82a.38.38,0,0,1-.44.02l-70.75-45.77a.38.38,0,0,1,0-.64l31.29-20.34a.38.38,0,0,0,.17-.32V239.76a.38.38,0,0,1,.59-.32l34.71,22.42a.38.38,0,0,0,.44-.02l36.98-29.76a.38.38,0,0,0-.03-.62l-72.52-47.31a.38.38,0,0,1-.17-.32V134.8a.38.38,0,0,0-.39-.38l-65.44,2.32a.38.38,0,0,1-.39-.36l-.55-11.28a.38.38,0,0,1,.14-.32l72.22-56.71a.38.38,0,0,0-.04-.62L361.76,50.79a.38.38,0,0,1-.04-.62L424.37,1.43a.38.38,0,0,1,.44-.02L538.19,75a.38.38,0,0,1,.07.58l-44.61,45.7a.38.38,0,0,1-.47.06L428,80.88a.38.38,0,0,0-.44.03L390.6,110.17a.38.38,0,0,0,.03.62l137.79,89.13a.38.38,0,0,1,.17.3Z" fill="#fff" />
                    <path id="Path_22350-4" data-name="Path 22350" d="M234.5,202.25v33.52a.31.31,0,0,1-.47.27L210.42,222.4a.31.31,0,0,1-.15-.27l-.05-34.81a.31.31,0,0,1,.48-.26l23.66,14.93a.31.31,0,0,1,.14.26Z" fill="#fff" />
                    <path id="Path_22351-4" data-name="Path 22351" d="M119.42,262.55l.11,8.68a.45.45,0,0,0,.22.39l53.21,30.54a.45.45,0,0,1,.05.74l-49.79,38.89a.45.45,0,0,1-.52.03L1.77,263.48a.45.45,0,0,1-.14-.62l34.71-53.73a.45.45,0,0,1,.62-.14l82.26,53.19a.45.45,0,0,1,.2.37Z" fill="#fff" />
                  </g>
                </svg>
                <span>SIMPLE GPT SUPPORT 記事作成</span>
              </h1>
              <div class="select-container">
                <label for="post-type">投稿する記事タイプを選択:</label>
                <select id="post-type" class="select js-select" name="post-type" aria-label="カスタム投稿のセレクトボックス">
                  <option value="">選択してください</option>
                  <?php $post_types = get_post_types(['public' => true], 'names', 'and'); ?>
                  <?php $exclude_types = ['page', 'attachment', 'revision', 'nav_menu_item']; ?>
                  <?php foreach ($post_types as $post_type) { ?>
                    <?php $object_name = get_post_type_object($post_type)->name; ?>
                    <?php $object_label = get_post_type_object($post_type)->label; ?>
                    <?php if (!in_array($object_name, $exclude_types)) { ?>
                      <option value='<?php echo $object_name ?>'><?php echo $object_label ?></option>;
                    <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>
          </header>
          <main>
            <div class="inner">
              <!-- inputのvalueにアクションフックのadmin_post_send_new_postを指定することで実行 -->
              <input type="hidden" name="action" value="send_new_post">
              <div class="sgs-chat-contents">
                <p class="gpt-model">Model: GPT-3.5</p>
                <?php $api = get_api_key(); ?>
                <?php if (!empty($api)) { ?>
                  <ul class="js-chat-list"></ul>
                <?php } else {; ?>
                  <p class="caution">まずは、一般設定からAPIキーの入力とChat GPTのデフォルトの設定をしましょう！</p>
                <?php }; ?>
                <div class="loader js-loader">
                  <div class="one"></div>
                  <div class="two"></div>
                  <div class="three"></div>
                  <div class="four"></div>
                </div>
              </div>
            </div>
          </main>
          <div class="typing-container">
            <div class="typing-content">
              <div class="typing-textarea">
                <textarea class="js-chat-input" id="chat-input" spellcheck="false" placeholder="入力してください"></textarea>
                <div class="tooltip send-tooltip">
                  <span id="send-btn" class="tooltip-icon material-symbols-rounded js-send-button" aria-describedby="send-tooltip" tabindex="0">send</span>
                  <div role="tooltip" id="send-tooltip">送信</div>
                </div>
              </div>
              <div class="typing-controls">
                <div class="tooltip">
                  <span class="tooltip-icon material-symbols-rounded js-theme-button" aria-describedby="theme-tooltip" tabindex="0">light_mode</span>
                  <div role="tooltip" id="theme-tooltip">テーマ切り替え</div>
                </div>
                <div class="tooltip">
                  <span class="tooltip-icon material-symbols-rounded js-reset-button" aria-describedby="delete-tooltip" tabindex="0">delete</span>
                  <div role="tooltip" id="delete-tooltip">チャット削除</div>
                </div>
              </div>
            </div>
            <div class="post">
              <button type="submit" name="sgs_post_send" class="post-button js-post-button" disabled>
                記事を投稿する
                <svg class="checkmark js-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                  <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"></circle>
                  <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php
}
