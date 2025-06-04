import Plugin from 'src/plugin-system/plugin.class';
import MinQuantityWarningPlugin from './min-quantity-warning';

// Register the plugin
PluginManager.register('MinQuantityWarning', MinQuantityWarningPlugin, '[data-min-quantity-warning]'); 