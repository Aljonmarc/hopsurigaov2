<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { LogOut, LayoutGrid, Users, Anchor, MapPin, ClipboardCheck, CreditCard, FileBarChart, Activity, Sailboat, CalendarClock, CloudSun, ClipboardList } from '@lucide/vue';
import { computed } from 'vue';
import AppLogo from '@/components/AppLogo.vue';
import NavMain from '@/components/NavMain.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard, logout } from '@/routes';
import { useRole } from '@/composables/useRole';
import type { NavItem } from '@/types';

const { isAdmin, isOperator, isTourist } = useRole();

const homeHref = computed(() => {
    if (isAdmin.value) return '/admin/dashboard';
    if (isOperator.value) return '/operator/dashboard';
    if (isTourist.value) return '/tourist/dashboard';
    return dashboard();
});

const adminNavItems: NavItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard', icon: LayoutGrid },
    { title: 'Users', href: '/admin/users', icon: Users },
    { title: 'Tour Operators', href: '/admin/tour-operators', icon: Anchor },
    { title: 'Destinations', href: '/admin/destinations', icon: MapPin },
    { title: 'Reservations', href: '/admin/reservations', icon: ClipboardCheck },
    { title: 'Payments', href: '/admin/payments', icon: CreditCard },
    { title: 'Reports', href: '/admin/reports', icon: FileBarChart },
    { title: 'Activity Logs', href: '/admin/activity-logs', icon: Activity },
];

const operatorNavItems: NavItem[] = [
    { title: 'Dashboard', href: '/operator/dashboard', icon: LayoutGrid },
    { title: 'Tour Packages', href: '/operator/tour-packages', icon: Sailboat },
    { title: 'Schedules', href: '/operator/schedules', icon: CalendarClock },
    { title: 'Reservations', href: '/operator/reservations', icon: ClipboardCheck },
    { title: 'Weather Advisory', href: '/operator/weather-advisory', icon: CloudSun },
];

const touristNavItems: NavItem[] = [
    { title: 'Dashboard', href: '/tourist/dashboard', icon: LayoutGrid },
    { title: 'Tour Packages', href: '/tourist/tour-packages', icon: Sailboat },
    { title: 'Destinations', href: '/tourist/destinations', icon: MapPin },
    { title: 'My Bookings', href: '/tourist/my-bookings', icon: ClipboardList },
    { title: 'Payments', href: '/tourist/payments', icon: CreditCard },
    { title: 'Weather Advisory', href: '/tourist/weather-advisory', icon: CloudSun },
];

const handleLogout = () => {
    router.flushAll();
};
</script>

<template>
    <Sidebar collapsible="offcanvas" variant="sidebar">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="homeHref">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <template v-if="isAdmin">
                <NavMain label="Administrator" :items="adminNavItems" />
                <NavMain label="Operator" :items="operatorNavItems" />
                <NavMain label="Tourist / User" :items="touristNavItems" />
            </template>
            <NavMain v-else-if="isOperator" label="Operator" :items="operatorNavItems" />
            <NavMain v-else-if="isTourist" label="Tourist / User" :items="touristNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton as-child>
                        <Link class="block w-full cursor-pointer" :href="logout()" @click="handleLogout" as="button"
                            data-test="logout-button">
                            <LogOut class="mr-2 h-4 w-4" />
                            <span>Log out</span>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>