<script setup lang="ts">
import { Monitor, Moon, Sun, Check } from '@lucide/vue';
import { useAppearance } from '@/composables/useAppearance';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

const { appearance, updateAppearance } = useAppearance();

const options = [
    { value: 'light', Icon: Sun, label: 'Light' },
    { value: 'dark', Icon: Moon, label: 'Dark' },
    { value: 'system', Icon: Monitor, label: 'System' },
] as const;

const currentIcon = () => {
    const match = options.find((o) => o.value === appearance.value);
    return match?.Icon ?? Monitor;
};
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger :as-child="true">
            <Button variant="ghost" size="icon" class="h-9 w-9 rounded-full">
                <component :is="currentIcon()" class="h-4 w-4" />
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent align="end" class="w-40">
            <DropdownMenuItem
                v-for="{ value, Icon, label } in options"
                :key="value"
                class="flex items-center justify-between cursor-pointer"
                @click="updateAppearance(value)"
            >
                <span class="flex items-center gap-2">
                    <component :is="Icon" class="h-4 w-4" />
                    <span class="text-sm">{{ label }}</span>
                </span>
                <Check
                    v-if="appearance === value"
                    class="h-4 w-4 text-neutral-900 dark:text-neutral-100"
                />
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>