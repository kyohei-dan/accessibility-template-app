<?php

if (!defined('ABSPATH')) exit;

/**
 * 一般設定ページ
 */
function page_sas_settings()
{
  // 設定を保存する関数
  sas_settings_update();

  if (isset($_POST['settings_save'])) {
    $api_key = sanitize_text_field($_POST['api_key']);
    $prompt = sanitize_text_field($_POST['prompt']);
  } else {
    $api_key = masked_api_key();
    $prompt = get_prompt();
  }
?>
  <div class="wrap">
    <form method="post">
      <div class="sas-settings">
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
                <span>SIMPLE AI SUPPORT 一般設定</span>
              </h1>
            </div>
          </header>
          <main>
            <div class="inner">
              <!-- WordPressが発行するセキュリティトークン -->
              <?php wp_nonce_field('sas_setting_save_action', 'sas_setting_save_action_token'); ?>
              <div class="form-table">
                <div class="input-container">
                  <input class="js-sas-input" type="text" id="api_key" name="api_key" value="<?php echo esc_attr($api_key); ?>" autocomplete="off" aria-labelledby="placeholder-api-key">
                  <label class="placeholder-text" for="api_key" id="placeholder-api-key">
                    <div class="text">ChatGPT API Key</div>
                  </label>
                </div>
                <div class="input-container">
                  <input class="js-sas-input" type="text" id="prompt" name="prompt" value="<?php echo $prompt; ?>" aria-labelledby="placeholder-prompt">
                  <label class="placeholder-text" for="prompt" id="placeholder-prompt">
                    <div class="text">ChatGPT プロンプト</div>
                  </label>
                </div>
              </div>

              <input type="submit" name="settings_save" class="button-primary" value="設定を保存" />
            </div>
          </main>
        </div>
      </div>
    </form>
  </div>
<?php
}
