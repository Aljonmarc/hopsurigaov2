<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { LogOut, LayoutGrid, Users, Anchor, MapPin, ClipboardCheck, CreditCard, FileBarChart, Activity, Sailboat, CalendarClock, CloudSun, ClipboardList } from '@lucide/vue';
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
import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [


    // Administrator
    { title: 'Dashboard', href: dashboard(), icon: LayoutGrid },
    { title: 'Users', href: dashboard(), icon: Users },
    { title: 'Tour Operators', href: dashboard(), icon: Anchor },
    { title: 'Destinations', href: dashboard(), icon: MapPin },
    { title: 'Reservations', href: dashboard(), icon: ClipboardCheck },
    { title: 'Payments', href: dashboard(), icon: CreditCard },
    { title: 'Reports', href: dashboard(), icon: FileBarChart },
    { title: 'Activity Logs', href: dashboard(), icon: Activity },


    // Tour Operator

    { title: 'Dashboard', href: dashboard(), icon: LayoutGrid },
    { title: 'Tour Packages', href: dashboard(), icon: Sailboat },
    { title: 'Schedules', href: dashboard(), icon: CalendarClock },
    { title: 'Reservations', href: dashboard(), icon: ClipboardCheck },
    { title: 'Weather Advisory', href: dashboard(), icon: CloudSun },


    // Tourist / User

    { title: 'Dashboard', href: dashboard(), icon: LayoutGrid },
    { title: 'Tour Packages', href: dashboard(), icon: Sailboat },
    { title: 'Destinations', href: dashboard(), icon: MapPin },
    { title: 'My Bookings', href: dashboard(), icon: ClipboardList },
    { title: 'Payments', href: dashboard(), icon: CreditCard },
    { title: 'Weather Advisory', href: dashboard(), icon: CloudSun },



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
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
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